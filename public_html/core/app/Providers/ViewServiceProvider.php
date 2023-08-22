<?php

namespace App\Providers;

use App\Models\AdsZone;
use App\Models\HomePage;
use App\Models\Language;
use App\Models\LiveChat;
use App\Models\Withdrawal;
use App\Models\SupportTicket;
use App\Models\GeneralSetting;
use App\Models\Admin\FaqSection;
use App\Models\AdminNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $general = GeneralSetting::first();
        $viewShare['general'] = $general;
        $ads = AdsZone::where('isActive', 1)->inRandomOrder();
        $viewShare['topAds'] = $ads;
        $viewShare['language'] = Language::all();
        $viewShare['rightAds'] = clone $ads;
        view()->share($viewShare);

        view()->composer('admin.layout.primary', function ($view) {
            $view->with([
                'pending_ticket_count' => SupportTicket::whereIN('status', [0, 2])->count(),
                'pending_withdraw_count' => Withdrawal::pending()->count(),
            ]);
        });

        view()->composer('admin.layout.primary', function ($view) {
            $view->with([
                'adminNotifications' => AdminNotification::where('read_status', 0)->with('user')->orderBy('id', 'desc')->get(),
            ]);
        });


        if ($general->force_ssl) {
            URL::forceScheme('https');
        }

        view()->share([
            'homePage' => HomePage::all()->toArray(),
            'faqSections' => FaqSection::all(),
        ]);


        Paginator::useBootstrap();
    }
}
