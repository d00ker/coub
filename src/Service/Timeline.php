<?php


namespace Coub\Service;

use GuzzleHttp\Exception\GuzzleException;

class Timeline extends AbstractService {
    /**
     * @param array $params An array of parameters.
     * @return object The timeline displays user's coubs and coubs from channels he or she follow,
     * in a chronological order.
     * @throws \ReflectionException
     */
    public function getMy(array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), '', $params);
    }

    /**
     * @param int $channel_id The identifier of the channel.
     * @param array $params An array of parameters.
     * @return object Returns coubs of the specified channel in a chronological order.
     * @throws \ReflectionException
     */
    public function getChannel(int $channel_id, array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), "channel/{$channel_id}", $params);
    }

    /**
     * @param string $tag_name The name of the required tag.
     * @param array $params An array of parameters.
     * @return object Displays all coubs tagged with the required tag.
     * @throws \ReflectionException
     */
    public function getTag(string $tag_name, array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), "tag/{$tag_name}", $params);
    }

    /**
     * @param array $params An array of parameters.
     * @return object Returns coubs which are most popular by now.
     * @throws \ReflectionException
     */
    public function getHot(array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), 'hot', $params);
    }

    /**
     * @param string $category_id One of categories IDs: random, newest, coub_of_the_day.
     * @param array $params An array of parameters.
     * @return object Returns coubs which are presented in the Explore section.
     * @throws \ReflectionException
     */
    public function getExplore(string $category_id = '', array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), 'explore/' . $category_id,$params);
    }

    /**
     * @param array $params An array of parameters.
     * @return object Returns coubs that you liked.
     * @throws \ReflectionException
     */
    public function getLikes(array $params = []) {
        return $this->getClient()->sendRequest('GET', $this->getServiceName(), 'likes', $params);
    }
}