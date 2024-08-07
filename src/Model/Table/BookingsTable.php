<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Booking newEmptyEntity()
 * @method \App\Model\Entity\Booking newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Booking> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Booking findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Booking> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Booking saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('booking_type');
        $this->setPrimaryKey('booking_id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'booking_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'bookings_users',
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
            ->scalar('booking_type')
            ->maxLength('booking_type', 20)
            ->requirePresence('booking_type', 'create')
            ->notEmptyString('booking_type');

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
