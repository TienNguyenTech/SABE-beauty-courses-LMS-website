<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizzes Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Quiz newEmptyEntity()
 * @method \App\Model\Entity\Quiz newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Quiz findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Quiz saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuizzesTable extends Table
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

        $this->setTable('quizzes');
        $this->setDisplayField('quiz_id');
        $this->setPrimaryKey('quiz_id');

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
            ->integer('course_id')
            ->notEmptyString('course_id');

        $validator
            ->scalar('quiz_json')
            ->maxLength('quiz_json', 4294967295)
            ->requirePresence('quiz_json', 'create')
            ->notEmptyString('quiz_json');

        $validator
            ->boolean('archived')
            ->notEmptyString('archived');

        $validator
            ->scalar('quiz_title')
            ->requirePresence('quiz_title', 'create')
            ->notEmptyString('quiz_title', 'Quiz title is required');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);

        return $rules;
    }
}
