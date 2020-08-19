<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TOrderHeader Model
 *
 * @method \App\Model\Entity\TOrderHeader newEmptyEntity()
 * @method \App\Model\Entity\TOrderHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TOrderHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TOrderHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\TOrderHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TOrderHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TOrderHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TOrderHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TOrderHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TOrderHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TOrderHeaderTable extends Table
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

        $this->setTable('t_order_header');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('id_user')
            ->maxLength('id_user', 30)
            ->allowEmptyString('id_user');

        $validator
            ->date('odr_date')
            ->notEmptyDate('odr_date');

        $validator
            ->scalar('paymnt_method')
            ->maxLength('paymnt_method', 50)
            ->requirePresence('paymnt_method', 'create')
            ->notEmptyString('paymnt_method');

        $validator
            ->scalar('shipping_unit')
            ->maxLength('shipping_unit', 50)
            ->requirePresence('shipping_unit', 'create')
            ->notEmptyString('shipping_unit');

        $validator
            ->decimal('fee')
            ->notEmptyString('fee');

        $validator
            ->scalar('address')
            ->maxLength('address', 150)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('reciever')
            ->maxLength('reciever', 50)
            ->requirePresence('reciever', 'create')
            ->notEmptyString('reciever');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('note')
            ->maxLength('note', 200)
            ->allowEmptyString('note');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->notEmptyString('status');

        $validator
            ->scalar('odr_flg')
            ->maxLength('odr_flg', 1)
            ->notEmptyString('odr_flg');

        $validator
            ->dateTime('create_datetime')
            ->notEmptyDateTime('create_datetime');

        $validator
            ->dateTime('update_datetime')
            ->notEmptyDateTime('update_datetime');

        return $validator;
    }
}
