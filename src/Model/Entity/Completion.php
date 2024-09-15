<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Completion Entity
 *
 * @property int $completion_id
 * @property int $user_id
 * @property int $course_id
 * @property \Cake\I18n\DateTime $completed_at
 * @property bool $archived
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Course $course
 */
class Completion extends Entity
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
        'user_id' => true,
        'course_id' => true,
        'completed_at' => true,
        'archived' => true,
        'user' => true,
        'course' => true,
    ];
}
