<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Progression Entity
 *
 * @property int $progression_id
 * @property int $user_id
 * @property int $content_id
 * @property bool $is_completed
 * @property \Cake\I18n\DateTime|null $completed_at
 * @property bool $archived
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Content $content
 */
class Progression extends Entity
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
        'content_id' => true,
        'is_completed' => true,
        'completed_at' => true,
        'archived' => true,
        'user' => true,
        'content' => true,
    ];
}
