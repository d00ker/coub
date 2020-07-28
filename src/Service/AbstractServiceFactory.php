<?php


namespace Coub\Service;


use function array_key_exists;

abstract class AbstractServiceFactory {
    /**
     * @var array $services An array of all services
     */
    private array $services;

    /**
     * AbstractServiceFactory constructor.
     */
    public function __construct() {
        $this->services = [];
    }

    abstract protected function getServiceClass($name);

    public function __get($name) {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass();
            }
            return $this->services[$name];
        }

        trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}