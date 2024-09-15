<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgressionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgressionsTable Test Case
 */
class ProgressionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgressionsTable
     */
    protected $Progressions;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Progressions',
        'app.Users',
        'app.Contents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Progressions') ? [] : ['className' => ProgressionsTable::class];
        $this->Progressions = $this->getTableLocator()->get('Progressions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Progressions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProgressionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProgressionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
