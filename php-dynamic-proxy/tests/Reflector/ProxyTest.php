<?php

namespace Attson\DynamicProxy\Tests\Reflector;

use Attson\DynamicProxy\Reflector\Proxy;
use Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInvocationHandler;
use Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInterface;
use PHPUnit\Framework\TestCase;

class ProxyTest extends TestCase {
    /**
     * @return void
     */
    public function testProxy (): void {
        /** @var CustomInterface $proxy */
        $proxy = Proxy::newProxyInstance([CustomInterface::class], new CustomInvocationHandler());

        self::assertEquals("Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInterface@hello", $proxy->hello());
    }
}