<?php


namespace Coub;

use Coub\Service\CoreServiceFactory;

class Coub {
    /**
     * @var string $domain A domain of Coub website.
     */
    public static string $domain = 'https://coub.com';

    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    /**
     * @param string $name A name of service.
     * @return object An object of service class.
     */
    public function __get($name) {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory();
        }

        return $this->coreServiceFactory->__get($name);
    }
}