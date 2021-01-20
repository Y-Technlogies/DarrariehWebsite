<?php

namespace App\Providers;

use App\FormFields\RandnumField;
use App\Listeners\ProductAdded;
use App\ProductOffer;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(RandnumField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addAction(\App\Actions\OrderPaymentStatus::class);
        view()->composer('*',function($view) {
            $view->with('isArabic', $this->app->getLocale() === 'ar');
        });

        view()->composer('partials.offers', function ($view) {
            $offers = ProductOffer::all();
            $active = $offers->where('is_active', '1')->count();
            $view->with(compact('offers', 'active'));
        });
    }
}
