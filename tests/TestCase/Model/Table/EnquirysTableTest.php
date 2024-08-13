<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnquirysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnquirysTable Test Case
 */
class EnquirysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnquirysTable
     */
    protected $Enquirys;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Enquirys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Enquirys') ? [] : ['className' => EnquirysTable::class];
        $this->Enquirys = $this->getTableLocator()->get('Enquirys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Enquirys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EnquirysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
