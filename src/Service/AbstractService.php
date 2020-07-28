<?php


namespace Coub\Service;


abstract class AbstractService {
    /**
     * @var object $client A client object.
     */
    protected object $client;

    /**
     * AbstractService constructor.
     * @param $client
     */
    public function __construct($client) {
        $this->client = $client;
    }

    /**
     * @return object A client.
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @param string $string A string for decamelizition.
     * @return string A decamelize string.
     */
    public function decamelize(string $string) {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }
}