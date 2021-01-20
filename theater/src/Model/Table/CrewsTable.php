<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crews Model
 *
 * @property \App\Model\Table\DramaEventsTable&\Cake\ORM\Association\BelongsTo $DramaEvents
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 *
 * @method \App\Model\Entity\Crew newEmptyEntity()
 * @method \App\Model\Entity\Crew newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Crew[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Crew get($primaryKey, $options = [])
 * @method \App\Model\Entity\Crew findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Crew patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Crew[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Crew|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crew saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CrewsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('crews');
        $this->setDisplayField('drama_event_id');
        $this->setPrimaryKey(['drama_event_id', 'person_id']);

        $this->belongsTo('DramaEvents', [
            'foreignKey' => 'drama_event_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['drama_event_id'], 'DramaEvents'), ['errorField' => 'drama_event_id']);
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);

        return $rules;
    }
}
