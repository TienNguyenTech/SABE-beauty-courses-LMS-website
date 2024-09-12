<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\BelongsTo $Bookings
 *
 * @method \App\Model\Entity\Payment newEmptyEntity()
 * @method \App\Model\Entity\Payment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Payment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Payment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Payment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Payment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PaymentsTable extends Table
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

        $this->setTable('payments');
        $this->setDisplayField('payment_id');
        $this->setPrimaryKey('payment_id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->decimal('payment_amount')
            ->requirePresence('payment_amount', 'create')
            ->notEmptyString('payment_amount');

        $validator
            ->dateTime('payment_datetime')
            ->requirePresence('payment_datetime', 'create')
            ->notEmptyDateTime('payment_datetime');

        $validator
            ->integer('course_id')
            ->notEmptyString('course_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('checkout_id')
            ->maxLength('checkout_id', 256)
            ->notEmptyString('checkout_id');

        $validator
            ->scalar('payment_email')
            ->maxLength('payment_email', 200)
            ->notEmptyString('payment_email');

        $validator
            ->integer('payment_seen');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
