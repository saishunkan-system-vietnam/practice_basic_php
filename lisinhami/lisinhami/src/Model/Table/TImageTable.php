<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TImage Model
 *
 * @method \App\Model\Entity\TImage newEmptyEntity()
 * @method \App\Model\Entity\TImage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\TImage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TImage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TImage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TImage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TImage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TImage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TImageTable extends Table
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

        $this->setTable('t_image');
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
            ->integer('id_prd')
            ->requirePresence('id_prd', 'create')
            ->notEmptyString('id_prd');

        $validator
            ->scalar('img_url')
            ->maxLength('img_url', 100)
            ->requirePresence('img_url', 'create')
            ->notEmptyString('img_url');

        $validator
            ->boolean('top_flg')
            ->notEmptyString('top_flg');

        $validator
            ->boolean('banner_flg')
            ->notEmptyString('banner_flg');

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
