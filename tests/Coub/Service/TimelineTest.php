<?php

namespace Coub\Service;

use Coub\Coub;
use PHPUnit\Framework\TestCase;

class TimelineTest extends TestCase {

    private $timeline;

    protected function setUp(): void {
        $this->timeline = (new Coub($_ENV['access_token']))->timeline;
    }

    /**
     * @dataProvider defaultParamsProvider
     */
    public function testGetLikes($params) {
        $this->assertIsArray($this->timeline->getLikes($params)->coubs);
    }

    /**
     * @dataProvider defaultParamsProvider
     */
    public function testGetMy($params) {
        $this->assertIsArray($this->timeline->getMy($params)->coubs);
    }

    /**
     * @dataProvider defaultParamsProviderForTags
     */
    public function testGetTag($tag_name, $params) {
        $this->assertIsArray($this->timeline->getTag($tag_name, $params)->coubs);
    }

    /**
     * @dataProvider defaultParamsProvider
     */
    public function testGetHot($params) {
        $this->assertIsArray($this->timeline->getHot($params)->coubs);
    }

    /**
     * @dataProvider defaultParamsProviderForExplore
     */
    public function testGetExplore($category_id, $params) {
        $this->assertIsArray($this->timeline->getExplore($category_id, $params)->coubs);
    }

    /**
     * @dataProvider defaultParamsProviderForChannel
     */
    public function testGetChannel($channel_id) {
        $this->assertIsArray($this->timeline->getChannel($channel_id)->coubs);
    }

    public function defaultParamsProvider() {
        return [
            [['page' => 1, 'per_page' => 1]],
            [['page' => 3, 'per_page' => 10]],
            [['page' => 10, 'per_page' => 5]]
        ];
    }

    public function defaultParamsProviderForTags() {
        return [
            'neil degrasse tyson' => ['neil degrasse tyson', ['order_by' => 'likes_count']],
            'universe' => ['universe', ['order_by' => 'views_count']],
            'sport' => ['sport', ['order_by' => 'newest_popular']],
            'moscow' => ['moscow', ['order_by' => 'oldest']],
        ];
    }

    public function defaultParamsProviderForChannel() {
        return [
            'Beautiful Moments' => [9009137],
            'provocationcoub' => [2789693],
            'Реальные вопросы?' => [9742719]
        ];
    }

    public function defaultParamsProviderForExplore() {
        return [
            'random' => ['random', ['page' => 2, 'per_page' => 4]],
            'newest' => ['newest', ['page' => 7, 'per_page' => 30]],
            'coub_of_the_day' => ['coub_of_the_day', ['page' => 20, 'per_page' => 6]]
        ];
    }
}
