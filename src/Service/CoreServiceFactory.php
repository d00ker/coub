<?php


namespace Coub\Service;


class CoreServiceFactory extends AbstractServiceFactory {
    /**
     * @var array $classMap An array of services classes.
     */
    private static array $classMap = [
        'oauth' => Oauth::class,
        'coubs' => Coubs::class,
        'timeline' => Timeline::class
    ];

    protected function getServiceClass($name) {
        return array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}