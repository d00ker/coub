<?php


namespace Coub;

use GuzzleHttp;

class Coub {
    /**
     * @var string $url Coub API URL v2.
     */
    protected $url = 'https://coub.com/api/v2/';

    /**
     * Coub constructor.
     */
    public function __construct() {
        $this->http = new GuzzleHttp\Client();
    }

    /**
     * @param string $entity An entity of API.
     * @param string $action An action of entity.
     * @param array $params An array of parameters.
     * @return string A fully formed URL for API method.
     */
    public function getUrl($entity, $action, $params) {
        return $this->url . $entity . '/' . $action . '?' . http_build_query($params);
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

    /**
     * @return \Coub\Timeline
     */
    public function timeline() {
        return new Timeline();
    }
}