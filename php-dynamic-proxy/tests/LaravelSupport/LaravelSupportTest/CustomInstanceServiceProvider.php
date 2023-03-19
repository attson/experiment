<?php

namespace Attson\DynamicProxy\Tests\LaravelSupport\LaravelSupportTest;

use Attson\DynamicProxy\LaravelSupport\Application;
use Illuminate\Support\ServiceProvider;

class CustomInstanceServiceProvider extends ServiceProvider {
    public function register () {

        /** @var Application $app */
        $app = $this->app;

        $app->registerInstanceFactory(new CustomInstanceFactory());
    }
}