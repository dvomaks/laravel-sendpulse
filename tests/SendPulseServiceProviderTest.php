<?php

namespace SendPulse\SendPulseLaravel;

use Dvomaks\LaravelSendPulse\SendPulseServiceProvider;

require __DIR__ . '/../vendor/autoload.php';

class SendPulseServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function test_register(): void
    {
        $app_mock = \Mockery::mock('Illuminate\Foundation\Application');
        $app_mock->shouldReceive('singleton')->once();

        $keen = (new SendPulseServiceProvider($app_mock))->register();

        $this->assertEquals(null, $keen);
    }
}