<?php

namespace Attson\DynamicProxy\Reflector;

interface InvocationHandler
{
    public function invoke(Proxy $proxy, InvocationMethod $method, array $args = []);
}
