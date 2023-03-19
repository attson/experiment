<?php

namespace Attson\DynamicProxy\Reflector;

use ReflectionClass;
use ReflectionException;

class Proxy {
    /**
     * @var array<ReflectionClass>
     */
    private array $refClasses;

    /**
     * @var InvocationHandler
     */
    private InvocationHandler $handler;

    /**
     * @var array
     */
    private array $invocationMethods = [];

    /**
     * @throws ReflectionException
     */
    private function __construct (array $classes, InvocationHandler $handler) {
        foreach ($classes as $class) {
            $this->refClasses[] = new ReflectionClass($class);
        }

        $this->handler = $handler;
    }

    private function getInvocationMethod (string $method) {
        if (!isset($this->invocationMethods[$method])) {
            foreach ($this->refClasses as $refClass) {
                if ($refClass->hasMethod($method)) {
                    $this->invocationMethods[$method] = new InvocationMethod($refClass->getMethod($method));

                    return $this->invocationMethods[$method];
                }
            }

            throw new \RuntimeException("proxy method [$method] not found.");
        }

        return $this->invocationMethods[$method];
    }

    public static function newProxyInstance (array $clazz, InvocationHandler $handler): Proxy {
        return new Proxy($clazz, $handler);
    }

    public function __call (string $name, array $arguments) {
        return $this->handler->invoke($this, $this->getInvocationMethod($name), $arguments);
    }
}
