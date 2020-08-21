<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TPaymentMethod Model
 *
 * @method \App\Model\Entity\TPaymentMethod newEmptyEntity()
 * @method \App\Model\Entity\TPaymentMethod newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TPaymentMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TPaymentMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\TPaymentMethod findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TPaymentMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TPaymentMethod[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TPaymentMethod|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TPaymentMethod saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TPaymentMethod[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TPaymentMethod[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TPaymentMethod[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TPaymentMethod[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TPaymentMethodTable extends Table
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

        $this->setTable('t_payment_method');
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
            ->scalar('payment_cd')
            ->maxLength('payment_cd', 3)
            ->requirePresence('payment_cd', 'create')
            ->notEmptyString('payment_cd');

        $validator
            ->scalar('method_paymnt')
            ->maxLength('method_paymnt', 50)
            ->requirePresence('method_paymnt', 'create')
            ->notEmptyString('method_paymnt');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 60)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

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
