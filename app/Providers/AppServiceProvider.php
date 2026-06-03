<?php

namespace App\Providers;

use App\Settings\AboutSettings;
use App\Settings\BenefitsSettings;
use App\Settings\GeneralSettings;
use App\Settings\HeroSettings;
use App\Settings\ProcessSettings;
use App\Settings\SeoSettings;
use App\Models\Brand;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-5');

        // Share settings with all views only after the settings table exists
        if (Schema::hasTable('settings')) {
            View::share('generalSettings', app(GeneralSettings::class));
            View::share('heroSettings',    app(HeroSettings::class));
            View::share('aboutSettings',   app(AboutSettings::class));
            View::share('processSettings', app(ProcessSettings::class));
            View::share('benefitsSettings', app(BenefitsSettings::class));
            View::share('seoSettings',      app(SeoSettings::class));
        }

        // Provide active brands to the trusted-brands slider partial wherever it's included
        if (Schema::hasTable('brands')) {
            View::composer('partials.trusted-brands', function ($view) {
                $view->with('brands', Brand::where('is_active', true)
                    ->orderBy('sort_order')->orderBy('name')->with('media')->get());
            });
        }
    }
}
