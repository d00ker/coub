<?php


namespace Coub\Service;


class Coubs extends AbstractService implements ServiceInterface {
    /**
     * @throws \ReflectionException
     * @return string A service name of API.
     */
    public function getServiceName(): string {
        return $this->decamelize((new \ReflectionClass($this))->getShortName());
    }

    /**
     * @param int $id An ID of coub.
     * @return object Info about coub (coub big JSON).
     * @throws \ReflectionException
     */
    public function getCoubByID(int $id) {
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('GET', $this->getClient()->getUrl($this->getServiceName(), $id))
        );
    }

    /**
     * @param int $id An ID of coub.
     * @param $params An array of parameters.
     * @return object Info about coub with updated data (coub big JSON).
     * @throws \ReflectionException
     */
    public function updateCoub(int $id, $params) {
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('POST', $this->getClient()->getUrl(
                $this->getServiceName(), "$id/update_info", $params)
            )
        );
    }

    /**
     * @param int $id An ID of coub.
     * @return object A JSON with the status of the deletion.
     * @throws \ReflectionException
     */
    public function deleteCoub(int $id) {
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('DELETE', $this->getClient()->getUrl($this->getServiceName(), $id))
        );
    }
}