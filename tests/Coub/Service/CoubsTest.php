<?php

namespace Coub\Service;

use Coub\Coub;
use PHPUnit\Framework\TestCase;

class CoubsTest extends TestCase {

    private $coubs;

    protected function setUp(): void {
        $this->coubs = (new Coub($_ENV['access_token']))->coubs;
    }

    /**
     * @dataProvider defaultParamsProviderForDelete
     */
    public function testDelete($id) {
        $this->assertEquals($this->coubs->delete($id)->status, 'ok');
    }

    /**
     * @dataProvider defaultParamsProviderForUpdate
     */
    public function testUpdate($id, $params) {
        $this->assertEquals($this->coubs->update($id, $params)->title, 'Test');
    }

    /**
     * @dataProvider defaultParamsProviderForByID
     */
    public function testGetByID($id) {
        $this->assertIsInt($this->coubs->getByID($id)->id);
    }

    public function defaultParamsProviderForDelete() {
        return [
            'Нил Деграсс Тайсон - признаки умного человека' => [150586658]
        ];
    }

    public function defaultParamsProviderForUpdate() {
        return [
            'Нил Деграсс Тайсон - о могуществе вселенной' => [150575594, ['coub[title]' => 'Test']]
        ];
    }

    public function defaultParamsProviderForByID() {
        return [
            'Weed Elves🚀' => [149923641]
        ];
    }
}
