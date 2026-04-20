<?php

namespace App\Console\Commands;

use App\Services\BrvmScraperService;
use Illuminate\Console\Command;

class ScrapeBrvm extends Command
{
    protected $signature = 'brvm:scrape';
    protected $description = 'Scrape et enregistre les données BRVM';

    public function handle(BrvmScraperService $service): void
    {
        $this->info('Scraping BRVM...');
        $record = $service->scrapeAndSave();

        $this->table(
            ['Index', 'Change', '%', 'Volume', 'Fallback'],
            [
                [
                    $record->index_value,
                    $record->change,
                    $record->change_percent . '%',
                    number_format($record->volume),
                    $record->is_fallback ? 'OUI' : 'NON',
                ]
            ]
        );
    }
}
