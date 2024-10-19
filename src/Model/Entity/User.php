<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $user_firstname
 * @property string $user_surname
 * @property string $email
 * @property string $user_phone
 * @property string $user_type
 * @property string $password
 * @property int $login_attempts
 * @property int $archived
 *
 * @property \App\Model\Entity\Course[] $courses
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_virtual = ['custom_display'];

    protected function _getCustomDisplay(){
        return $this->user_firstname . ' ' . $this->user_surname . ' (' . $this->email . ')';
    }

    protected array $_accessible = [
        'user_firstname' => true,
        'user_surname' => true,
        'email' => true,
        'user_phone' => true,
        'user_type' => true,
        'password' => true,
        'courses' => true,
        'login_attempts' => true,
        'archived' => true
    ];

    /**
     * @param string $password
     * @return string|null
     *
     * Enable password hashing
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }
}
