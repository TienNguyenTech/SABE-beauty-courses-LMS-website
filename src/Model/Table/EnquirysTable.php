<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enquirys Model
 *
 * @property \App\Model\Table\EnquirysTable&\Cake\ORM\Association\HasMany $Enquirys
 *
 * @method \App\Model\Entity\Enquiry newEmptyEntity()
 * @method \App\Model\Entity\Enquiry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Enquiry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Enquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Enquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EnquirysTable extends Table
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

        $this->setTable('enquirys');
        $this->setDisplayField('enquiry_name');

        $this->hasMany('Enquirys', [
            'foreignKey' => 'enquiry_id',
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
            ->scalar('enquiry_name')
            ->maxLength('enquiry_name', 50)
            ->requirePresence('enquiry_name', 'create')
            ->notEmptyString('enquiry_name')
            ->add('enquiry_name', 'custom', [
            'rule' => function ($value, $context) {
            return (bool) preg_match('/^[a-zA-Z ]*$/', $value);
            },
            'message' => 'The enquiry name can only contain letters and spaces.',
            ]);

        $validator
            ->scalar('enquiry_email')
            ->maxLength('enquiry_email', 100)
            ->requirePresence('enquiry_email', 'create')
            ->notEmptyString('enquiry_email')
            ->add('enquiry_email', 'validFormat', [
            'rule' => 'email',
            'message' => 'Please enter a valid email address.',
            ]);

        $validator
            ->scalar('enquiry_subject')
            ->maxLength('enquiry_subject', 100)
            ->requirePresence('enquiry_subject', 'create')
            ->notEmptyString('enquiry_subject');

        $validator
            ->scalar('enquiry_message')
            ->maxLength('enquiry_message', 1000)
            ->requirePresence('enquiry_message', 'create')
            ->notEmptyString('enquiry_message');

        $validator
            ->integer('enquiry_seen')
            ->notEmptyString('enquiry_seen');

        $validator
            ->boolean('archived');

        return $validator;
    }
}
