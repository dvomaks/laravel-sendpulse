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

You should refer to the [SendPulse API](https://sendpulse.com/api) and underlying [SendPush PHP class](https://github.com/sendpulse/sendpulse-rest-api-php) for full details about all
available methods.
