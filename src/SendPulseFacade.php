<?php

namespace Dvomaks\LaravelSendPulse;

use Illuminate\Support\Facades\Facade;

class SendPulseFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SendPulseApi::class;
    }
}
