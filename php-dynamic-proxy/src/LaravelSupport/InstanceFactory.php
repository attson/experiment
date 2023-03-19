<?php

namespace Attson\DynamicProxy\LaravelSupport;

interface InstanceFactory {
    /**
     * @param $abstract
     * @return bool
     */
    public function resolvable($abstract): bool;

    /**
     * shared mean object is singleton
     *
     * @param $abstract
     * @return bool
     */
    public function isShared($abstract): bool;

    /**
     * return callable, then laravel application will resolve it
     *
     * @param $abstract
     * @return callable
     */
    public function resolve($abstract);
}