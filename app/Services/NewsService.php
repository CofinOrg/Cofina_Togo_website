<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsService
{
    private array $feeds = [

        'https://www.brvm.org/fr/rss.xml',

        /*  'https://www.african-markets.com/rss.xml',
         'https://www.rfi.fr/fr/rss/economie',

         'https://www.boursorama.com/rss/actualites',
         'https://www.bloomberg.com/africa',

         'https://www.lemonde.fr/economie/rss_full.xml', */

    ];

    public function fetchAll(): array
    {
        $news = [];

        foreach ($this->feeds as $feedUrl) {
            try {
                $response = Http::timeout(10)
                    ->withoutVerifying()
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get($feedUrl);

                if (!$response->successful())
                    continue;

                $xml = simplexml_load_string(
                    $response->body(),
                    'SimpleXMLElement',
                    LIBXML_NOCDATA
                );

                if (!$xml || !isset($xml->channel->item))
                    continue;

                $source = parse_url($feedUrl, PHP_URL_HOST);

                foreach ($xml->channel->item as $item) {
                    $news[] = [
                        'title' => trim((string) $item->title),
                        'url' => trim((string) $item->link),
                        'description' => trim(strip_tags((string) $item->description)),
                        'date' => (string) $item->pubDate,
                        'timestamp' => strtotime((string) $item->pubDate) ?: 0,
                        'source' => $source,
                        'image' => $this->extractImage($item),
                    ];
                }

            } catch (\Throwable $e) {
                Log::warning("RSS échoué : $feedUrl — " . $e->getMessage());
                continue;
            }
        }

        // Trier par date décroissante
        usort($news, fn($a, $b) => $b['timestamp'] - $a['timestamp']);

        return array_slice($news, 0, 30);
    }

    // Extrait l'image depuis enclosure ou media:content
    private function extractImage(\SimpleXMLElement $item): ?string
    {
        // Essai 1 : balise enclosure
        if (isset($item->enclosure) && (string) $item->enclosure['type'] === 'image/jpeg') {
            return (string) $item->enclosure['url'];
        }

        // Essai 2 : media:content
        $media = $item->children('media', true);
        if (isset($media->content)) {
            return (string) $media->content['url'];
        }

        // Essai 3 : extraire du contenu HTML
        preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', (string) $item->description, $matches);
        return $matches[1] ?? null;
    }
}
