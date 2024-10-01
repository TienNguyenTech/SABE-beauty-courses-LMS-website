<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('user_firstname');
        $this->setPrimaryKey('user_id');

//        // Adding the authenticate behaviour to check for missing columns in users table
//        $this->addBehavior('CanAuthenticate');



        
        $this->belongsToMany('Courses', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_users',
        ]);
    }
    public function validationResetPassword(Validator $validator): Validator
    {
        $validator
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'Please enter a password')
            ->add('password', 'validFormat', [
                'rule' => ['custom', '/^(?=.*[A-Z])(?=(.*\d){2,})(?=.*[!@#$%^&*()_+\-=\[\]{};\'":\\|,.<>\/?]).{8,}$/'],
                'message' => 'Password must be at least 8 characters long, contain at least one uppercase letter, at least two digits, and at least one special character.'
            ])
            ->requirePresence('password_confirm', 'create')
            ->notEmptyString('password_confirm', 'Please confirm your password')
            ->add('password_confirm', 'custom', [
                'rule' => function ($value, $context) {
                    return $value === $context['data']['password'];
                },
                'message' => 'Passwords do not match',
            ]);

        return $validator;
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
            ->scalar('user_firstname')
            ->maxLength('user_firstname', 50)
            ->requirePresence('user_firstname', 'create')
            ->notEmptyString('user_firstname')
            ->add('user_firstname', 'custom', [
                'rule' => function ($value, $context) {
                    return (bool) preg_match('/^[a-zA-Z ]*$/', $value);
                },
                'message' => 'The first name can only contain letters and spaces.',
            ]);

        $validator
            ->scalar('user_surname')
            ->maxLength('user_surname', 50)
            ->requirePresence('user_surname', 'create')
            ->notEmptyString('user_surname')
            ->add('user_surname', 'custom', [
                'rule' => function ($value, $context) {
                    return (bool) preg_match('/^[a-zA-Z ]*$/', $value);
                },
                'message' => 'The surname can only contain letters and spaces.',
            ]);

        $validator
            ->scalar('email')
            ->maxLength('email', 100)
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'validFormat', [
            'rule' => 'email',
            'message' => 'Please enter a valid email address.',
            ]);

        $validator
            ->scalar('user_phone')
            ->maxLength('user_phone', 15)
            ->notEmptyString('user_phone')
            ->add('user_phone', 'numeric', [
                'rule' => 'numeric',
                'message' => 'The phone number can only contain digits.',
            ]);

        $validator
            ->scalar('user_type')
            ->maxLength('user_type', 20)
            ->requirePresence('user_type', 'create')
            ->notEmptyString('user_type');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password', 'validFormat', [
                'rule' => ['custom', '/^(?=.*[A-Z])(?=(.*\d){2,})(?=.*[!@#$%^&*()_+\-=\[\]{};\'":\\|,.<>\/?]).{8,}$/'],
                'message' => 'Password must be at least 8 characters long, contain at least one uppercase letter, at least two digits, and at least one special character.'
            ]);

        return $validator;
    }
}
