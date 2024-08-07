<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $user_firstname
 * @property string $user_surname
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_type
 * @property string $user_password
 *
 * @property \App\Model\Entity\Booking[] $bookings
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
    protected array $_accessible = [
        'user_firstname' => true,
        'user_surname' => true,
        'user_email' => true,
        'user_phone' => true,
        'user_type' => true,
        'user_password' => true,
        'bookings' => true,
        'courses' => true,
    ];
}
