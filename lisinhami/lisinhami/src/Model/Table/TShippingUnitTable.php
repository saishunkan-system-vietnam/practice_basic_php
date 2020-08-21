<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TShippingUnit Model
 *
 * @method \App\Model\Entity\TShippingUnit newEmptyEntity()
 * @method \App\Model\Entity\TShippingUnit newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TShippingUnit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TShippingUnit get($primaryKey, $options = [])
 * @method \App\Model\Entity\TShippingUnit findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TShippingUnit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TShippingUnit[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TShippingUnit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TShippingUnit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TShippingUnit[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TShippingUnit[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TShippingUnit[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TShippingUnit[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TShippingUnitTable extends Table
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

        $this->setTable('t_shipping_unit');
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
            ->scalar('ship_cd')
            ->maxLength('ship_cd', 3)
            ->requirePresence('ship_cd', 'create')
            ->notEmptyString('ship_cd');

        $validator
            ->scalar('shipping_unit')
            ->maxLength('shipping_unit', 50)
            ->requirePresence('shipping_unit', 'create')
            ->notEmptyString('shipping_unit');

        $validator
            ->decimal('fee')
            ->notEmptyString('fee');

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
