<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceCategorys Model
 *
 * @method \App\Model\Entity\ServiceCategory newEmptyEntity()
 * @method \App\Model\Entity\ServiceCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ServiceCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ServiceCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ServiceCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceCategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ServiceCategorysTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('service_categorys');
        $this->setDisplayField('category_name');
        $this->setPrimaryKey('category_id');
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
            ->scalar('category_name')
            ->maxLength('category_name', 200)
            ->requirePresence('category_name', 'create')
            ->notEmptyString('category_name');

        return $validator;
    }
}
