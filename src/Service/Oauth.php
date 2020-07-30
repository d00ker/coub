<?php


namespace Coub\Service;


class Oauth extends AbstractService {
    /**
     * @param string $redirect_uri The callback URL which the Coub server responses in with client credentials.
     * @param string $client_id The unique application identifier.
     * @param string $scope Access permissions that your application could be granted.
     * @return string A URL which your application will must be redirect. After granting the access the Coub server
     * redirects the user to the callback URL adding an authorisation code to the request.
     * @throws \ReflectionException
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
        // TODO: add return with domain
        return $this->getClient()->getUri($this->getServiceName(), 'authorize', false) . '?' . http_build_query($params);
    }

    /**
     * @param string $client_id The unique application identifier.
     * @param string $client_secret The app's secret token.
     * @param string $code The received authorization code.
     * @param string $redirect_uri The callback URL which the Coub server responses in with client credentials.
     * @return object
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
        return $this->getClient()->sendRequest('POST', $this->getServiceName(), 'token', $params, false);
    }
}