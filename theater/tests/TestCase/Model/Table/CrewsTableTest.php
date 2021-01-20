<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrewsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrewsTable Test Case
 */
class CrewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CrewsTable
     */
    protected $Crews;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Crews',
        'app.DramaEvents',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Crews') ? [] : ['className' => CrewsTable::class];
        $this->Crews = $this->getTableLocator()->get('Crews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Crews);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
