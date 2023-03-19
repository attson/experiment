<?php

namespace Attson\DynamicProxy\Tests\LaravelSupport\LaravelSupportTest;

use Attson\DynamicProxy\LaravelSupport\InstanceFactory;
use Attson\DynamicProxy\Reflector\Proxy;
use Attson\DynamicProxy\Tests\Reflector\ProxyTest\CustomInvocationHandler;

class CustomInstanceFactory implements InstanceFactory {

    public function resolvable ($abstract): bool {
        if (interface_exists($abstract) && str_contains($abstract, 'Custom')) {
            return true;
        }

        return false;
    }

    public function isShared ($abstract): bool {
        return true;
    }

    public function resolve ($abstract) {
        return function () use ($abstract) {
            return Proxy::newProxyInstance([$abstract], new CustomInvocationHandler());
        };
    }
}