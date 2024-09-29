<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceCategorysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceCategorysTable Test Case
 */
class ServiceCategorysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceCategorysTable
     */
    protected $ServiceCategorys;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ServiceCategorys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ServiceCategorys') ? [] : ['className' => ServiceCategorysTable::class];
        $this->ServiceCategorys = $this->getTableLocator()->get('ServiceCategorys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ServiceCategorys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServiceCategorysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
