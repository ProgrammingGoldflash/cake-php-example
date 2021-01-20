<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DramasFixture
 */
class DramasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'genre_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'person_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_DRAMA_GENRE1_idx' => ['type' => 'index', 'columns' => ['genre_id'], 'length' => []],
            'fk_DRAMA_PERSON1_idx' => ['type' => 'index', 'columns' => ['person_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'dra_name_UNIQUE' => ['type' => 'unique', 'columns' => ['name', 'person_id', 'genre_id'], 'length' => []],
            'fk_DRAMA_PERSON1' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_DRAMA_GENRE1' => ['type' => 'foreign', 'columns' => ['genre_id'], 'references' => ['genres', 'Id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'genre_id' => 1,
                'person_id' => 1,
            ],
        ];
        parent::init();
    }
}
