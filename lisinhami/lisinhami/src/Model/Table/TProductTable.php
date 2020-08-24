<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TProduct Model
 *
 * @method \App\Model\Entity\TProduct newEmptyEntity()
 * @method \App\Model\Entity\TProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\TProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TProductTable extends Table
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

        $this->setTable('t_product');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('category_cd')
            ->notEmptyString('category_cd');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->decimal('discount')
            ->notEmptyString('discount');

        $validator
            ->integer('tax')
            ->requirePresence('tax', 'create')
            ->notEmptyString('tax');

        $validator
            ->scalar('made_in')
            ->maxLength('made_in', 30)
            ->requirePresence('made_in', 'create')
            ->notEmptyString('made_in');

        $validator
            ->scalar('info_gen')
            ->maxLength('info_gen', 300)
            ->requirePresence('info_gen', 'create')
            ->notEmptyString('info_gen');

        $validator
            ->scalar('info_dtl')
            ->allowEmptyString('info_dtl');

        $validator
            ->integer('point')
            ->notEmptyString('point');

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
