<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CrewsFixture
 */
class CrewsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'drama_event_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'person_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_CREW_EVENT1_idx' => ['type' => 'index', 'columns' => ['drama_event_id'], 'length' => []],
            'fk_CREW_PERSON1_idx' => ['type' => 'index', 'columns' => ['person_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['drama_event_id', 'person_id'], 'length' => []],
            'fk_CREW_PERSON1' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_CREW_EVENT1' => ['type' => 'foreign', 'columns' => ['drama_event_id'], 'references' => ['drama_events', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'drama_event_id' => 1,
                'person_id' => 1,
            ],
        ];
        parent::init();
    }
}
