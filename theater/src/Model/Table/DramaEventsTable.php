<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DramaEvents Model
 *
 * @property \App\Model\Table\DramasTable&\Cake\ORM\Association\BelongsTo $Dramas
 * @property \App\Model\Table\CrewsTable&\Cake\ORM\Association\HasMany $Crews
 *
 * @method \App\Model\Entity\DramaEvent newEmptyEntity()
 * @method \App\Model\Entity\DramaEvent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DramaEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DramaEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\DramaEvent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DramaEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DramaEvent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DramaEvent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DramaEvent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DramaEvent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DramaEvent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DramaEvent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DramaEvent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DramaEventsTable extends Table
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

        $this->setTable('drama_events');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dramas', [
            'foreignKey' => 'drama_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Crews', [
            'foreignKey' => 'drama_event_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

        return $validator;
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
        $rules->add($rules->existsIn(['drama_id'], 'Dramas'), ['errorField' => 'drama_id']);

        return $rules;
    }
}
