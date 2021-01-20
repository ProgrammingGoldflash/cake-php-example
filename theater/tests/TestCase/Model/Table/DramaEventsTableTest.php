<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DramaEventsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DramaEventsTable Test Case
 */
class DramaEventsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DramaEventsTable
     */
    protected $DramaEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DramaEvents',
        'app.Dramas',
        'app.Crews',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DramaEvents') ? [] : ['className' => DramaEventsTable::class];
        $this->DramaEvents = $this->getTableLocator()->get('DramaEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DramaEvents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
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
