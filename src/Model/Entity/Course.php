<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $course_id
 * @property string $course_name
 * @property string $course_description
 * @property string $course_price
 * @property string $course_image
 * @property string $course_category
 * @property int $course_featured
 *
 * @property \App\Model\Entity\User[] $users
 */
class Course extends Entity
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
        'course_name' => true,
        'course_description' => true,
        'course_price' => true,
        'course_image' => true,
        'course_category' => true,
        'course_featured' => true,
        'users' => true,
    ];
}
