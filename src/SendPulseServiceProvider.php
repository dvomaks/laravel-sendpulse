<?php

namespace Dvomaks\LaravelSendPulse;

use Illuminate\Support\ServiceProvider;
use Sendpulse\RestApi\Storage\FileStorage;
use Sendpulse\RestApi\Storage\SessionStorage;

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
            __DIR__ . '/config/laravel-sendpulse.php' => config_path('sendpulse.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SendPulseApi::class, function($app) {

            $config = $app['config']['sendpulse'];

            if ($config['storage'] === 'session') {
                $storage = new SessionStorage();
            } else {
                $storage = new FileStorage();
            }

            return (new SendPulseApi($config['api_user_id'], $config['api_secret'], $storage));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [SendPulseApi::class];
    }
}
