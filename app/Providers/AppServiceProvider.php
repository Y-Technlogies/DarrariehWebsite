<?php

namespace App\Providers;

use App\ProductOffer;
use App\Listeners\ProductAdded;
use App\FormFields\RandnumField;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        JsonResource::withoutWrapping();
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
