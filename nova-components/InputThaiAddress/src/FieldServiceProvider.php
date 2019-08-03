<?php

namespace Wasandev\InputThaiAddress;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/input-thai-address'),
            ], 'input-thai-address-lang');

            $this->publishes([
                __DIR__ . '/../config' => config_path(),
            ], 'input-thai-address-config');
        }


        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'input-thai-address');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/input-thai-address'));

        Nova::serving(function (ServingNova $event) {
            Nova::script('map_address_gmaps', $this->googleMapsSource());
            Nova::script('input-thai-address', __DIR__ . '/../dist/js/field.js');
            Nova::style('input-thai-address', __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/input-thai-address.php', 'input-thai-address');
    }
    private function googleMapsSource()
    {
        return vsprintf(
            'https://maps.googleapis.com/maps/api/js?key=%s&language=%s&libraries=places,geometry',
            [
                Config::get('input-thai-address.api_key'),
                Config::get('input-thai-address.language'),
            ]
        );
    }
}
