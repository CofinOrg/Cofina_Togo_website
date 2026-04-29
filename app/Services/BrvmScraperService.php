<?php

namespace App\Services;

use App\Models\BrvmMarketData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;
class BrvmScraperService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }



    private string $url = 'https://www.brvm.org/fr/marche-des-actions';

    public function scrapeAndSave(): BrvmMarketData
    {
        try {
            $data = $this->scrape();
            $data['is_fallback'] = false;
            $data['scraped_at'] = now();

        } catch (\Throwable $e) {
            Log::warning('BRVM scraping échoué : ' . $e->getMessage());
            $data = $this->fallback();
        }

        // On insère une nouvelle ligne à chaque scraping (historique)
        return BrvmMarketData::create($data);
    }
    private function scrape(): array
    {
        $response = Http::timeout(15)
            ->withoutVerifying()
            ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; Laravel)'])
            ->get($this->url);

        if (!$response->successful()) {
            throw new \Exception("HTTP {$response->status()}");
        }


        $crawler = new Crawler($response->body());
        $rows = $crawler->filter('table.activity tbody tr');

        if ($rows->count() === 0) {
            throw new \Exception("Tableau activity introuvable");
        }

        // Ligne 0 col 1 → volume
        $volumeRaw = $rows->eq(0)->filter('td')->eq(1)->text('0');

        // Ligne 1 col 1 → market cap
        $marketCapRaw = $rows->eq(1)->filter('td')->eq(1)->text('0');

        // Ligne 3 col 1 → BRVM-C index (407,36)
        $indexRaw = $rows->eq(3)->filter('td')->eq(1)->text('0');

        // Ligne 3 col 2 → variation % (0,23%)
        $percentRaw = $rows->eq(3)->filter('td')->eq(2)->text('0');

        $indexRaw = $rows->eq(3)->filter('td')->eq(1)->text('0');
        $percentRaw = $rows->eq(3)->filter('td')->eq(2)->text('0');

        $index = $this->parseNumber($indexRaw);
        $percent = $this->parseNumber($percentRaw);
        $change = round($index / (1 + $percent / 100) * ($percent / 100), 2);

        return [
            'index_value' => $index,
            'change' => $change,   // ← calculé
            'change_percent' => $percent,
            'volume' => (int) $this->parseNumber($volumeRaw),
            'listed_companies' => 45,
            'market_cap' => (int) $this->parseNumber($marketCapRaw),
        ];
    }



    // Cherche le sélecteur dans le DOM, retourne le texte ou '0'
    private function extractText(Crawler $crawler, string $selectors): string
    {
        foreach (explode(',', $selectors) as $selector) {
            try {
                $node = $crawler->filter(trim($selector));
                if ($node->count() > 0) {
                    return trim($node->first()->text());
                }
            } catch (\Throwable) {
                continue;
            }
        }
        return '0';
    }

    // Le volume total est souvent la somme des volumes du tableau
    private function extractVolume(Crawler $crawler): string
    {
        try {
            $total = 0;
            $crawler->filter('table tbody tr')->each(function (Crawler $row) use (&$total) {
                // Colonne volume (adapter l'index selon le tableau BRVM)
                $cells = $row->filter('td');
                if ($cells->count() >= 6) {
                    $total += $this->parseNumber($cells->eq(5)->text());
                }
            });
            return (string) $total;
        } catch (\Throwable) {
            return '0';
        }
    }


    private function parseNumber(string $raw): float
    {
        // Supprime FCFA, espaces normaux et insécables, garde chiffres , . -
        $clean = preg_replace(
            '/[^\d,.\-]/',
            '',
            str_replace([' ', '\xc2\xa0', 'FCFA'], '', $raw)
        );
        $clean = str_replace(',', '.', $clean);
        return (float) $clean ?: 0.0;
    }

    private function fallback(): array
    {
        return [
            'index_value' => 224.67,
            'change' => 1.45,
            'change_percent' => 0.65,
            'volume' => 156_000_000,
            'listed_companies' => 45,
            'market_cap' => 8_200_000_000_000,
            'is_fallback' => true,
            'scraped_at' => now(),
        ];
    }
}
