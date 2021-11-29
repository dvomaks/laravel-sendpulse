<?php

namespace Dvomaks\LaravelSendPulse;

require __DIR__ . '/../vendor/autoload.php';

class SendPulseServiceProviderTest extends \PHPUnit\Framework\TestCase
{
    public function test_register(): void
    {
        $app_mock = \Mockery::mock('Illuminate\Foundation\Application');
        $app_mock->shouldReceive('singleton')->once();

        $keen = (new SendPulseServiceProvider($app_mock))->register();

        $this->assertEquals(null, $keen);
    }
}
