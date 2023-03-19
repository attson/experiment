<?php

namespace Attson\DynamicProxy\Tests;

use Attson\DynamicProxy\LaravelSupport\Application;
use Orchestra\Testbench\Foundation\PackageManifest;

class TestCase extends \Orchestra\Testbench\TestCase {
    protected function resolveApplication () {
        return tap(new Application($this->getBasePath()), function ($app) {
            $app->bind(
                'Illuminate\Foundation\Bootstrap\LoadConfiguration',
                'Orchestra\Testbench\Bootstrap\LoadConfiguration'
            );

            PackageManifest::swap($app, $this);
        });
    }
}