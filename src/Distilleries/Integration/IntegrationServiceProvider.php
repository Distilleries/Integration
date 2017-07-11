<?php namespace Distilleries\Integration;


use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('integration.php'),
            __DIR__ . '/../../database/seeds/'   => base_path('/database/seeds'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../../web.php');
        $this->loadViewsFrom(__DIR__ . '/../../views', 'integration');
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'integration');
        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/integration'),
        ], 'views');

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'integration'
        );

    }

}
