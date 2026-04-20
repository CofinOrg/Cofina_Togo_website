<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CustomerMessageController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\JobOfferController;
use App\Http\Controllers\API\AgenceController;
use App\Http\Controllers\API\AnalyticsController;
use App\Http\Controllers\API\AnnouncementController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ServiceProductController;
use App\Http\Controllers\API\SpontaneousApplicationController;
use App\Http\Controllers\API\PreRegistrationController;
use App\Http\Controllers\API\BusinessClubMemberController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\CvExtractorController;
use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\CvController;
use App\Http\Controllers\API\BrvmMarketDataController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Support\Facades\Route;

// Routes publiques (pas d'authentification requise)
Route::prefix('blogs')->name('blog.')->controller(BlogController::class)->group(function (): void {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});




Route::get('agences', [AgenceController::class, 'index'])->name('agence.public.index');

Route::prefix('job_offers')->name('job_offer.')->controller(JobOfferController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('announcements')->name('announcement.public.')->controller(AnnouncementController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('spontaneous_applications')->name('spontaneous_application.public.')->controller(SpontaneousApplicationController::class)->group(function () {
    Route::post('/', 'store')->name('store');
});

Route::prefix('sliders')->name('slide.')->controller(SliderController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('service_products')->name('service_product.')->controller(ServiceProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('services')->name('service.')->controller(ServiceController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('pre_registrations')->name('pre_registration.')->controller(PreRegistrationController::class)->group(function () {
    Route::post('/', 'store')->name('store');
});


Route::prefix('customer_messages')->name('customer_message.')->controller(CustomerMessageController::class)->group(function () {
    Route::post('/', 'store')->name('store');
});

Route::prefix('business_club_members')->name('business_club_member.')->controller(BusinessClubMemberController
    ::class)->group(function () {
        Route::post('/', 'store')->name('store');
    });

Route::post('/chat', [ChatController::class, 'ask'])->name('chat');

Route::prefix('cvs')->name('cv.')->controller(CvController::class)->group(function () {
    Route::post('/', 'store')->name('store');
});


Route::prefix('brvm')->group(function () {
    Route::get('/latest', [BrvmMarketDataController::class, 'latest']);
    Route::get('/history', [BrvmMarketDataController::class, 'history']);
});

Route::get('/news', [NewsController::class, 'index']);



Route::controller(AuthController::class)->group(function () {
    Route::post("auth/login", "login");

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix("/auth")->name("auth.")->group(function () {
            Route::get('data', "data")->name("data");
            Route::delete('logout', "logout")->name("logout");
        });

        // Route pour changer le mot de passe (accessible même si password_change_required est true)
        Route::put('users/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');

        // Routes protégées par le middleware de statut de compte
        /*  Route::middleware('account.status')->group(function () { */
        // Routes utilisateurs
        Route::prefix('users')->name('user.')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            /* }); */



        });


        //BlogImg
        /*      Route::prefix('blog_imgs')->name('blog_img.')->controller(BlogImgController::class)->group(function () {
                 Route::get('/', 'index')->name('index');
                 Route::post('/', 'store')->name('store');
                 Route::get('/{id}', 'show')->name('show');
                 Route::put('/{id}', 'update')->name('update');
                 Route::delete('/{id}', 'destroy')->name('destroy');
             }); */

        //Job offers
        Route::prefix('job_offers')->name('job_offer.')->controller(JobOfferController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('blogs')->name('blog.')->controller(BlogController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('agences')->name('agence.')->controller(AgenceController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('announcements')->name('announcement.')->controller(AnnouncementController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });


        Route::prefix('sliders')->name('slide.')->controller(SliderController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('services')->name('service.')->controller(ServiceController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('service_products')->name('service_product.')->controller(ServiceProductController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('customer_messages')->name('customer_message.')->controller(CustomerMessageController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::delete('/{id}', 'destroy')->name('destroy');

        });

        Route::prefix('spontaneous_applications')->name('spontaneous_application.')->controller(SpontaneousApplicationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::delete('/{id}', 'destroy')->name('destroy');


        });

        Route::prefix('pre_registrations')->name('pre_registration.')->controller(PreRegistrationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('business_club_members')->name('business_club_member.')->controller(BusinessClubMemberController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::get('analytics/overview', [AnalyticsController::class, 'overview'])->name('analytics.overview');

        Route::prefix('cv_extractors')->name('cv_extractor.')->controller(CvExtractorController::class)->group(function () {
            Route::get('/', action: 'extract')->name('extract');
            Route::get('/{cvId}', action: 'extractById')->name('extract-by-id');
            Route::post('/upload', action: 'extractFromUpload')->name('extract-upload');
        });

        Route::prefix('notifications')->name('notification.')->controller(NotificationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/unread-count', 'unreadCount')->name('unread-count');
            Route::put('/{id}/mark-as-read', 'markAsRead')->name('mark-as-read');
            Route::put('/mark-all-as-read', 'markAllAsRead')->name('mark-all-as-read');
            Route::get('/{id}', 'show')->name('show');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('cvs')->name('cv.')->controller(CvController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('applications')->name('application.')->controller(ApplicationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });



    });
});
