<?php


namespace Coub\Service;


class Coubs extends AbstractService {
    /**
     * @param int $id The identifier of the required coub.
     * @return object Return coub big JSON.
     * @throws \ReflectionException
     */
    public function getByID(int $id) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), $id);
    }

    /**
     * @param int $id The identifier of the required coub.
     * @param $params An array of parameters.
     * @return object Return coub big JSON with updated data.
     * @throws \ReflectionException
     */
    public function update(int $id, $params) {
        return $this->getClient()->sendRequest('POST', $this->getServiceName(), $id, $params);
    }

    /**
     * @param int $id The identifier of the required coub.
     * @return object A JSON with the status of the deletion.
     * @throws \ReflectionException
     */
    public function delete(int $id) {
        return $this->getClient()->sendRequest('DELETE', $this->getServiceName(), $id);
    }
}