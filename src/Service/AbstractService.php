<?php


namespace Coub\Service;

use Coub\Coub;
use GuzzleHttp;

class AbstractService {
    /**
     * @var string $uriAPI Coub API URI v2.
     */
    protected string $uriAPI = '/api/v2/';

    /**
     * @var GuzzleHttp\Client
     */
    protected GuzzleHttp\Client $http;

    /**
     * AbstractService constructor.
     */
    public function __construct() {
        $this->http = new GuzzleHttp\Client();
    }

    /**
     * @param string $service A service of API.
     * @param string $action An action of entity.
     * @param array $params An array of parameters.
     * @return string A fully formed URL for API method.
     */
    public function getUrl($service, $action, $params) {
        return Coub::$domain . $this->uriAPI . $service . '/' . $action . '?' . http_build_query($params);
    }

    /**
     * @param string $method One of REST methods, like GET, POST, etc.
     * @param string $url An resource URL.
     * @return object \Psr\Http\Message\ResponseInterface An object of result.
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function doRequest($method, $url) {
        return $this->http->request($method, $url);
    }

    /**
     * @param object $request An object of request.
     * @return array A result.
     */
    public function getResponse($request) {
        return json_decode($request->getBody());
    }
}