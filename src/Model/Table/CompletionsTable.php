<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Completions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Completion newEmptyEntity()
 * @method \App\Model\Entity\Completion newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Completion> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Completion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Completion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Completion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Completion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Completion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Completion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Completion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Completion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Completion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Completion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Completion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Completion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Completion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Completion> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CompletionsTable extends Table
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

        $this->setTable('completions');
        $this->setDisplayField('completion_id');
        $this->setPrimaryKey('completion_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
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
            ->integer('course_id')
            ->notEmptyString('course_id');

        $validator
            ->dateTime('completed_at')
            ->notEmptyDateTime('completed_at');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);

        return $rules;
    }
}
