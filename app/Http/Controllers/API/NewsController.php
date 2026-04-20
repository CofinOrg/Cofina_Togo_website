<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function __construct(private NewsService $newsService)
    {

    }

    public function index()
    {
        // Cache 30 min pour ne pas surcharger les flux RSS
        $news = Cache::remember('financial_news', 1800, function () {
            return $this->newsService->fetchAll();
        });


        return response()->json([
            'success' => true,
            'data' => $news,
        ]);
    }
}
