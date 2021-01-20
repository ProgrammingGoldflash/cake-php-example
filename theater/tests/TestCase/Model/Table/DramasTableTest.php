<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DramasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DramasTable Test Case
 */
class DramasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DramasTable
     */
    protected $Dramas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dramas',
        'app.Genres',
        'app.Persons',
        'app.DramaEvents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Dramas') ? [] : ['className' => DramasTable::class];
        $this->Dramas = $this->getTableLocator()->get('Dramas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dramas);

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
