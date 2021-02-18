<?php

namespace Dvomaks\LaravelSendPulse;

use Illuminate\Support\Facades\Facade;
use Sendpulse\RestAPI\ApiClient;

class SendPulseFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ApiClient::class;
    }
}