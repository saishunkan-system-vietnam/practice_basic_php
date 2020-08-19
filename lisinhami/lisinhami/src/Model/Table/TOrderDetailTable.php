<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TOrderDetail Model
 *
 * @method \App\Model\Entity\TOrderDetail newEmptyEntity()
 * @method \App\Model\Entity\TOrderDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TOrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TOrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\TOrderDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TOrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TOrderDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TOrderDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TOrderDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TOrderDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TOrderDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TOrderDetailTable extends Table
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

        $this->setTable('t_order_detail');
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
            ->integer('id_odrh')
            ->requirePresence('id_odrh', 'create')
            ->notEmptyString('id_odrh');

        $validator
            ->integer('id_product')
            ->requirePresence('id_product', 'create')
            ->notEmptyString('id_product');

        $validator
            ->integer('amount')
            ->notEmptyString('amount');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->decimal('tax')
            ->notEmptyString('tax');

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
