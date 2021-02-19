# SendPulse Laravel Helper

[![Build Status](https://travis-ci.org/dvomaks/laravel-sendpulse.svg?branch=master)](https://travis-ci.org/dvomaks/laravel-sendpulse)

A service provider and facade to set up and use the [SendPulse](https://sendpulse.com/) PHP library in Laravel 5.

This package consists of a service provider, which binds an instance of an initialized SendPulse client to the
IoC-container and a SendPulse facade so you may access all methods of the Sendpulse\RestAPI\ApiClient class
via the syntax:

```php
$message = ['title' => 'My first notification', 'website_id' => 1, 'body' => 'I am the body of the push message'];

SendPulse::createPushTask($message);
```

You should refer to the [SendPulse API](https://sendpulse.com/api) and underlying [SendPulseApi PHP class](https://github.com/sendpulse/sendpulse-rest-api-php) for full details about all
available methods.

## Setup

1. Install the 'dvomaks/laravel-sendpulse' package

   Note, this will also install the required sendpulse/rest-api package.

    ```shell
    $ composer require dvomaks/laravel-sendpulse dev-master
    ```

2. Update 'config/app.php'

    ```php
    # Add `SendPulseLaravelServiceProvider` to the `providers` array
    'providers' => array(
        ...
        'Dvomaks\LaravelSendPulse\SendPulseServiceProvider',
    )

    # Add the `SendPushFacade` to the `aliases` array
    'aliases' => array(
        ...
        'SendPulse' => 'Dvomaks\LaravelSendPulse\SendPulseFacade',
    )
    ```

3. Publish the configuration file (creates sendpulse.php in config directory) and add your API keys and optional default settings.

   ```shell
   $ php artisan vendor:publish
   ```
