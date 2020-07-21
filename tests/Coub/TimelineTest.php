<?php

namespace Coub;

use PHPUnit\Framework\TestCase;

class TimelineTest extends TestCase {

    private $timeline;

    protected function setUp(): void {
        $this->timeline = new Timeline();
    }

    /**
     * @dataProvider defaultParamsProviderForHot
     */
    public function testGetHot($params) {
        $this->assertIsArray($this->timeline->getHot($params));
    }

    /**
     * @dataProvider defaultParamsProviderForExplore
     */
    public function testGetExplore() {
        $this->assertIsArray($this->timeline->getExplore());
    }

    public function defaultParamsProviderForHot() {
        return [
            [['page' => 1, 'per_page' => 1]],
            [['page' => 3, 'per_page' => 10]],
            [['page' => 10, 'per_page' => 5]]
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
