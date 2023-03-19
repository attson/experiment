<?php

namespace Attson\DynamicProxy\Tests\LaravelSupport;

use Attson\DynamicProxy\Tests\LaravelSupport\LaravelSupportTest\CustomInstanceServiceProvider;
use Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInterface;
use Attson\DynamicProxy\Tests\TestCase;

class LaravelSupportTest extends TestCase {
    protected function getPackageProviders ($app) {
        return [CustomInstanceServiceProvider::class];
    }

    /**
     * @return void
     */
    public function testProxy (): void {
        $proxy = app(CustomInterface::class);

        self::assertEquals("Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInterface@hello", $proxy->hello());
    }
}