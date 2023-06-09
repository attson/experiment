<?php

namespace Attson\DynamicProxy\LaravelSupport;

class Application extends \Illuminate\Foundation\Application {
    /**
     * @var array<InstanceFactory>
     */
    protected array $instanceFactories = [];

    public function getConcrete ($abstract) {
        foreach ($this->instanceFactories as $factory) {
            if ($factory->resolvable($abstract)) {
                return $factory->resolve($abstract);
            }
        }
        return parent::getConcrete($abstract);
    }

    public function registerInstanceFactory (InstanceFactory $factory) {
        $this->instanceFactories[] = $factory;
    }

    public function isShared ($abstract) {
        foreach ($this->instanceFactories as $factory) {
            if ($factory->resolvable($abstract)) {
                return $factory->isShared($abstract);
            }
        }

        return parent::isShared($abstract);
    }
}