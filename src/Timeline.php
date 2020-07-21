<?php


namespace Coub;

class Timeline extends Coub {
    /**
     * @var string $entity An entity of API.
     */
    protected $entity = 'timeline';

    /**
     * @param array $params An array of parameters.
     * @return array Returns coubs which are most popular by now.
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHot($params = []) {
        return $this->getResponse(
            $this->getRequest('GET', $this->getUrl($this->entity, 'hot', $params))
        );
    }

    /**
     * @param string $category_id One of categories IDs: random, newest, coub_of_the_day.
     * @param array $params An array of parameters.
     * @return array Returns coubs which are presented in the Explore section.
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getExplore($category_id = '', $params = []) {
        return $this->getResponse(
            $this->getRequest('GET', $this->getUrl($this->entity, 'explore/' . $category_id, $params))
        );
    }
}