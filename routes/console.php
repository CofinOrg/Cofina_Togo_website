<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('brvm:scrape')->everyFifteenMinutes();

Schedule::call(function () {
    Cache::forget('financial_news');
})->everyThirtyMinutes();
