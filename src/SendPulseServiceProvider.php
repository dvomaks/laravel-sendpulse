<?php

namespace Dvomaks\LaravelSendPulse;

use Illuminate\Support\ServiceProvider;
use Sendpulse\RestAPI\ApiClient;

class SendPulseServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Setup configuration publishing.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/laravel-sendpulse.php.php' => config_path('sendpulse.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiClient::class, function($app) {

            $config = $app['config']['sendpulse'];
            
            return (new ApiClient($config['apiUserId'], $config['apiSecret'], null));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [ApiClient::class];
    }
}
