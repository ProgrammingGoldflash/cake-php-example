<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dramas Model
 *
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsTo $Genres
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\DramaEventsTable&\Cake\ORM\Association\HasMany $DramaEvents
 *
 * @method \App\Model\Entity\Drama newEmptyEntity()
 * @method \App\Model\Entity\Drama newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Drama[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Drama get($primaryKey, $options = [])
 * @method \App\Model\Entity\Drama findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Drama patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Drama[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Drama|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drama saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DramasTable extends Table
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

        $this->setTable('dramas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Genres', [
            'foreignKey' => 'genre_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DramaEvents', [
            'foreignKey' => 'drama_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['genre_id'], 'Genres'), ['errorField' => 'genre_id']);
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);

        return $rules;
    }
}
