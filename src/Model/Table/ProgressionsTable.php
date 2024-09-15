<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Progressions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContentsTable&\Cake\ORM\Association\BelongsTo $Contents
 *
 * @method \App\Model\Entity\Progression newEmptyEntity()
 * @method \App\Model\Entity\Progression newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Progression> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Progression get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Progression findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Progression patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Progression> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Progression|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Progression saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Progression>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Progression>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Progression>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Progression> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Progression>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Progression>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Progression>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Progression> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProgressionsTable extends Table
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

        $this->setTable('progressions');
        $this->setDisplayField('progression_id');
        $this->setPrimaryKey('progression_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Contents', [
            'foreignKey' => 'content_id',
            'joinType' => 'INNER',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('content_id')
            ->notEmptyString('content_id');

        $validator
            ->boolean('is_completed')
            ->notEmptyString('is_completed');

        $validator
            ->dateTime('completed_at')
            ->allowEmptyDateTime('completed_at');

        $validator
            ->boolean('archived')
            ->notEmptyString('archived');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['content_id'], 'Contents'), ['errorField' => 'content_id']);

        return $rules;
    }
}
