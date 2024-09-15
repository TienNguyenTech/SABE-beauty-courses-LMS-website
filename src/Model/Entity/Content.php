<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $content_id
 * @property int $course_id
 * @property string $content_type
 * @property string $content_url
 * @property string $content_title
 * @property string|null $content_description
 * @property int $content_position
 * @property bool $archived
 *
 * @property \App\Model\Entity\Course $course
 */
class Content extends Entity
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
        'content_type' => true,
        'content_url' => true,
        'content_title' => true,
        'content_description' => true,
        'content_position' => true,
        'archived' => true,
        'course' => true,
    ];
}
