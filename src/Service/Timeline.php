<?php


namespace Coub\Service;

use GuzzleHttp\Exception\GuzzleException;

class Timeline extends AbstractService {
    /**
     * @var string $entity An entity of API.
     */
    protected string $entity = 'timeline';

    /**
     * @param array $params An array of parameters.
     * @return array Returns coubs which are most popular by now.
     * @throws GuzzleException
     */
    public function getHot($params = []) {
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('GET', $this->getClient()->getUrl($this->entity, 'hot', $params))
        );
    }

    /**
     * @param string $category_id One of categories IDs: random, newest, coub_of_the_day.
     * @param array $params An array of parameters.
     * @return array Returns coubs which are presented in the Explore section.
     * @throws GuzzleException
     */
    public function getExplore($category_id = '', $params = []) {
        return $this->getClient()->getResponse(
            $this->getClient()->doRequest('GET', $this->getClient()->getUrl($this->entity, 'explore/' . $category_id,$params))
        );
    }
}