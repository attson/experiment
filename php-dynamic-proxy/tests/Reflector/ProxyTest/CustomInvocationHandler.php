<?php

namespace Attson\DynamicProxy\Tests\Reflector\ProxyTest;

use Attson\DynamicProxy\Reflector\InvocationHandler;
use Attson\DynamicProxy\Reflector\InvocationMethod;
use Attson\DynamicProxy\Reflector\Proxy;

class CustomInvocationHandler implements InvocationHandler {
    public function __construct () { }

    public function invoke (Proxy $proxy, InvocationMethod $method, array $args = []) {
        return $method->getClass()."@".$method->getName();
    }
}