<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\StringFilter;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AnalyticsController extends Controller
{
    private function getClient(): BetaAnalyticsDataClient
    {
        $credentialsPath = base_path(config('services.google_analytics.credentials_path'));

        if (!file_exists($credentialsPath)) {
            abort(500, 'Fichier de credentials Google Analytics introuvable. Placez le JSON du service account dans : ' . config('services.google_analytics.credentials_path'));
        }

        return new BetaAnalyticsDataClient([
            'credentials' => $credentialsPath,
        ]);
    }

    private function getProperty(): string
    {
        $propertyId = config('services.google_analytics.property_id');

        if (empty($propertyId)) {
            abort(500, 'ANALYTICS_PROPERTY_ID non configuré. Ajoutez votre Property ID GA4 dans le fichier .env');
        }

        return "properties/{$propertyId}";
    }

    public function overview(Request $request): JsonResponse
    {
        $request->validate([
            'period' => 'sometimes|string|in:7d,30d,90d',
        ]);

        $period = $request->get('period', '30d');
        $days = (int) filter_var($period, FILTER_SANITIZE_NUMBER_INT);
        $startDate = "{$days}daysAgo";
        $cacheKey = "analytics_overview_{$period}";

        $data = Cache::remember($cacheKey, now()->addMinutes(15), function () use ($startDate) {
            $client = $this->getClient();
            $property = $this->getProperty();

            $summary = $this->fetchSummary($client, $property, $startDate);
            $dailyVisitors = $this->fetchDailyVisitors($client, $property, $startDate);
            $topPages = $this->fetchTopPages($client, $property, $startDate);
            $trafficSources = $this->fetchTrafficSources($client, $property, $startDate);
            $devices = $this->fetchDevices($client, $property, $startDate);
            $countries = $this->fetchCountries($client, $property, $startDate);

            return [
                'summary' => $summary,
                'daily_visitors' => $dailyVisitors,
                'top_pages' => $topPages,
                'traffic_sources' => $trafficSources,
                'devices' => $devices,
                'countries' => $countries,
            ];
        });

        return response()->json($data);
    }

    private function fetchSummary(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'metrics' => [
                new Metric(['name' => 'totalUsers']),
                new Metric(['name' => 'newUsers']),
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'averageSessionDuration']),
                new Metric(['name' => 'bounceRate']),
            ],
        ]);

        $response = $client->runReport($request);

        $row = $response->getRows()[0] ?? null;
        if (!$row) {
            return [
                'totalUsers' => 0,
                'newUsers' => 0,
                'sessions' => 0,
                'screenPageViews' => 0,
                'averageSessionDuration' => 0,
                'bounceRate' => 0,
            ];
        }

        $values = [];
        foreach ($row->getMetricValues() as $value) {
            $values[] = $value->getValue();
        }

        return [
            'totalUsers' => (int) ($values[0] ?? 0),
            'newUsers' => (int) ($values[1] ?? 0),
            'sessions' => (int) ($values[2] ?? 0),
            'screenPageViews' => (int) ($values[3] ?? 0),
            'averageSessionDuration' => round((float) ($values[4] ?? 0), 1),
            'bounceRate' => round((float) ($values[5] ?? 0) * 100, 1),
        ];
    }

    private function fetchDailyVisitors(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'date'])],
            'metrics' => [
                new Metric(['name' => 'totalUsers']),
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'sessions']),
            ],
            'order_bys' => [
                new OrderBy([
                    'dimension' => new DimensionOrderBy(['dimension_name' => 'date']),
                ]),
            ],
        ]);

        $response = $client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $date = $row->getDimensionValues()[0]->getValue();
            $metrics = [];
            foreach ($row->getMetricValues() as $value) {
                $metrics[] = $value->getValue();
            }
            $data[] = [
                'date' => substr($date, 0, 4) . '-' . substr($date, 4, 2) . '-' . substr($date, 6, 2),
                'users' => (int) ($metrics[0] ?? 0),
                'pageViews' => (int) ($metrics[1] ?? 0),
                'sessions' => (int) ($metrics[2] ?? 0),
            ];
        }

        return $data;
    }

    private function fetchTopPages(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'pagePath'])],
            'metrics' => [
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'totalUsers']),
                new Metric(['name' => 'averageSessionDuration']),
            ],
            'dimension_filter' => new FilterExpression([
                'not_expression' => new FilterExpression([
                    'filter' => new Filter([
                        'field_name' => 'pagePath',
                        'string_filter' => new StringFilter([
                            'match_type' => MatchType::BEGINS_WITH,
                            'value' => '/Cofinoistg@admin',
                            'case_sensitive' => false,
                        ]),
                    ]),
                ]),
            ]),
            'order_bys' => [
                new OrderBy([
                    'metric' => new MetricOrderBy(['metric_name' => 'screenPageViews']),
                    'desc' => true,
                ]),
            ],
            'limit' => 10,
        ]);

        $response = $client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $metrics = [];
            foreach ($row->getMetricValues() as $value) {
                $metrics[] = $value->getValue();
            }
            $data[] = [
                'page' => $row->getDimensionValues()[0]->getValue(),
                'pageViews' => (int) ($metrics[0] ?? 0),
                'users' => (int) ($metrics[1] ?? 0),
                'avgDuration' => round((float) ($metrics[2] ?? 0), 1),
            ];
        }

        return $data;
    }

    private function fetchTrafficSources(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'sessionDefaultChannelGroup'])],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'order_bys' => [
                new OrderBy([
                    'metric' => new MetricOrderBy(['metric_name' => 'sessions']),
                    'desc' => true,
                ]),
            ],
        ]);

        $response = $client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $data[] = [
                'channel' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $data;
    }

    private function fetchDevices(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'deviceCategory'])],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'order_bys' => [
                new OrderBy([
                    'metric' => new MetricOrderBy(['metric_name' => 'sessions']),
                    'desc' => true,
                ]),
            ],
        ]);

        $response = $client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $data[] = [
                'device' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $data;
    }

    private function fetchCountries(BetaAnalyticsDataClient $client, string $property, string $startDate): array
    {
        $request = new RunReportRequest([
            'property' => $property,
            'date_ranges' => [new DateRange(['start_date' => $startDate, 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'country'])],
            'metrics' => [
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'totalUsers']),
            ],
            'order_bys' => [
                new OrderBy([
                    'metric' => new MetricOrderBy(['metric_name' => 'sessions']),
                    'desc' => true,
                ]),
            ],
            'limit' => 10,
        ]);

        $response = $client->runReport($request);

        $data = [];
        foreach ($response->getRows() as $row) {
            $metrics = [];
            foreach ($row->getMetricValues() as $value) {
                $metrics[] = $value->getValue();
            }
            $data[] = [
                'country' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => (int) ($metrics[0] ?? 0),
                'users' => (int) ($metrics[1] ?? 0),
            ];
        }

        return $data;
    }
}
