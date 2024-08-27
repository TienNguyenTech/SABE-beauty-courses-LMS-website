<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Course newEmptyEntity()
 * @method \App\Model\Entity\Course newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Course> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Course findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Course> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Course saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CoursesTable extends Table
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

        $this->setTable('courses');
        $this->setDisplayField('course_name');
        $this->setPrimaryKey('course_id');

        $this->belongsToMany('Users', [
            'foreignKey' => 'course_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'courses_users',
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
            ->scalar('course_name')
            ->maxLength('course_name', 100)
            ->requirePresence('course_name', 'create')
            ->notEmptyString('course_name');

        $validator
            ->scalar('course_description')
            ->maxLength('course_description', 1000)
            ->requirePresence('course_description', 'create')
            ->notEmptyString('course_description');

        $validator
            ->decimal('course_price')
            ->requirePresence('course_price', 'create')
            ->notEmptyString('course_price')
            ->greaterThanOrEqual('course_price', 0, 'The course price cannot be negative.')
            ->lessThanOrEqual('course_price', 1000000, 'The course price cannot exceed 1 million.');

        $validator
            ->scalar('course_image')
            ->maxLength('course_image', 200)
            ->allowEmptyString('course_image')
            ->requirePresence('course_image', 'create');

        $validator
            ->scalar('course_category')
            ->maxLength('course_category', 50)
            ->requirePresence('course_category', 'create')
            ->notEmptyString('course_category');

        $validator
            ->integer('course_featured')
            ->notEmptyString('course_featured');

        return $validator;
    }
}
