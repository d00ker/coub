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
}