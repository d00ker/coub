<?php


namespace Coub\Service;


use function array_key_exists;

abstract class AbstractServiceFactory {
    /**
     * @var object $client A client object.
     */
    private object $client;

    /**
     * @var array $services An array of all services
     */
    private array $services;

    /**
     * AbstractServiceFactory constructor.
     * @param $client
     */
    public function __construct($client) {
        $this->client = $client;
        $this->services = [];
    }

    abstract protected function getServiceClass($name);

    public function __get($name) {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }
            return $this->services[$name];
        }

        trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}