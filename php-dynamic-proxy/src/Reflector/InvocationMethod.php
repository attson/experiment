<?php

namespace Attson\DynamicProxy\Reflector;

use ReflectionException;
use ReflectionMethod;

class InvocationMethod {
    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @var ReflectionMethod
     */
    private ReflectionMethod $reflectionMethod;

    /**
     * @var string
     */
    private string $returnType;

    public function __construct (ReflectionMethod $reflectionMethod) {
        $this->reflectionMethod = $reflectionMethod;

        $this->returnType = $reflectionMethod->getReturnType();
    }

    public function getReturnType (): string {
        return $this->returnType;
    }

    public function getName (): string {
        return $this->reflectionMethod->getName();
    }

    public function getClass (): string {
        return $this->reflectionMethod->class;
    }

    /**
     * @throws ReflectionException
     */
    public function invoke ($object, array $args) {
        return $this->reflectionMethod->invoke($object, ...$args);
    }

    public function setAttribute (string $key, $value): void {
        $this->attributes[$key] = $value;
    }

    public function getAttribute (string $key) {
        return $this->attributes[$key] ?? null;
    }

    /**
     * @return ReflectionMethod
     */
    public function getRefMethod (): ReflectionMethod {
        return $this->reflectionMethod;
    }
}
