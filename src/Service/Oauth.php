<?php


namespace Coub\Service;


class Oauth extends AbstractService implements ServiceInterface {
    /**
     * @throws \ReflectionException
     * @return string A service name of API.
     */
    public function getServiceName(): string {
        return $this->decamelize((new \ReflectionClass($this))->getShortName());
    }

    /**
     * @param string $redirect_uri
     * @param string $client_id
     * @param string $scope
     * @return string An URL which you will must be redirected.
     */
    public function doAuthorize(string $redirect_uri, string $client_id, string $scope = '') {
        $params = [
            'redirect_uri' => $redirect_uri,
            'client_id' => $client_id,
            'response_type' => 'code'
        ];
        if ($scope) {
            $params['scope'] = $scope;
        }
        return $this->getClient()->getUrl($this->getServiceName(), 'authorize', $params, false);
    }

    /**
     * @param string $client_id
     * @param string $client_secret
     * @param string $code
     * @param string $redirect_uri
     * @return mixed
     * @throws \ReflectionException
     */
    public function getToken(string $client_id, string $client_secret, string $code, string $redirect_uri) {
        $params = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $code,
            'redirect_uri' => $redirect_uri,
            'grant_type' => 'authorization_code'
        ];
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('POST', $this->getClient()->getUrl($this->getServiceName(), 'token', $params, false))
        );
    }
}