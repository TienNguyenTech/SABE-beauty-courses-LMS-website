<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $quiz_id
 * @property int $course_id
 * @property string $quiz_json
 * @property bool $archived
 *
 * @property \App\Model\Entity\Course $course
 */
class Quiz extends Entity
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
        'course_id' => true,
        'quiz_json' => true,
        'archived' => true,
        'course' => true,
    ];
}
