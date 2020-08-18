<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TUser Model
 *
 * @method \App\Model\Entity\TUser newEmptyEntity()
 * @method \App\Model\Entity\TUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\TUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TUserTable extends Table
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

        $this->setTable('t_user');
        $this->setDisplayField('uid');
        $this->setPrimaryKey('uid');
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
            ->scalar('uid')
            ->maxLength('uid', 30)
            ->allowEmptyString('uid', null, 'create');

        $validator
            ->scalar('pass')
            ->maxLength('pass', 30)
            ->requirePresence('pass', 'create')
            ->notEmptyString('pass');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 50)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->boolean('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->boolean('admin_flg')
            ->notEmptyString('admin_flg');

        $validator
            ->boolean('del_flg')
            ->notEmptyString('del_flg');

        $validator
            ->dateTime('create_datetime')
            ->notEmptyDateTime('create_datetime');

        $validator
            ->dateTime('update_datetime')
            ->notEmptyDateTime('update_datetime');

        return $validator;
    }
}
