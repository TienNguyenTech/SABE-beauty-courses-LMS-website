<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Content newEmptyEntity()
 * @method \App\Model\Entity\Content newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Content> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Content findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Content> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('content_type');
        $this->setPrimaryKey('content_id');

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
            ->scalar('content_type')
            ->maxLength('content_type', 20)
            ->requirePresence('content_type', 'create')
            ->notEmptyString('content_type');

        $validator
            ->scalar('content_url')
            ->maxLength('content_url', 500)
            ->requirePresence('content_url', 'create')
            ->notEmptyString('content_url');

        $validator
            ->scalar('content_title')
            ->maxLength('content_title', 100)
            ->requirePresence('content_title', 'create')
            ->notEmptyString('content_title');

        $validator
            ->scalar('content_description')
            ->maxLength('content_description', 2000)
            ->allowEmptyString('content_description');

        $validator
            ->integer('content_position')
            ->requirePresence('content_position', 'create')
            ->notEmptyString('content_position');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);

        return $rules;
    }
}
