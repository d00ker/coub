<?php


namespace Coub;

use GuzzleHttp;
use Coub\Service\CoreServiceFactory;

class Coub {
    /**
     * @var string $domain A domain of Coub website.
     */
    public static string $domain = 'https://coub.com';

    /**
     * @var string $uriAPI Coub API URI v2.
     */
    protected string $uriAPI = '/api/v2/';

    /**
     * @var GuzzleHttp\Client
     */
    protected GuzzleHttp\Client $http;

    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    /**
     * @var string $accessToken An access token.
     * It should be added to every API request as the access_token parameter of the URL.
     */
    private $accessToken;

    /**
     * @return string
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void {
        $this->accessToken = $accessToken;
    }

    /**
     * AbstractService constructor.
     * @param string $accessToken
     */
    public function __construct($accessToken = '') {
        if ($accessToken) {
            $this->setAccessToken($accessToken);
        }
        $this->http = new GuzzleHttp\Client([
            'base_uri' => self::$domain . $this->uriAPI
        ]);
    }

    /**
     * @param string $service A service of API.
     * @param string $action An action of entity.
     * @param bool $uriAPI If API URI is needed.
     * @return string A fully formed URI for API method.
     */
    public function getUri($service, $action, $uriAPI = true) {
        return (($uriAPI) ? '' : '/') . $service . '/' . $action;
    }

    /**
     * @param string $method One of REST methods, like GET, POST, etc.
     * @param string $service A service of API.
     * @param string $action An action of entity.
     * @param array $params An array of parameters.
     * @param bool $uriAPI If API URI is needed.
     * @return object \Psr\Http\Message\ResponseInterface An object of result.
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest($method, $service, $action, $params = [], $uriAPI = true) {
        if ($service !== 'oauth') {
            $params['access_token'] = $this->getAccessToken();
        }
        return json_decode(
            $this->http->request(
                $method,
                $this->getUri($service, $action, $uriAPI),
                ['query' => $params]
            )->getBody()
        );
    }

    /**
     * @param string $name A name of service.
     * @return object An object of service class.
     */
    public function __get($name) {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}