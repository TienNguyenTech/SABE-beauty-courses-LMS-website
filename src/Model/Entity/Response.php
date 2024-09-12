<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Response Entity
 *
 * @property int $response_id
 * @property int $user_id
 * @property int $quiz_id
 * @property string $response_json
 * @property float $response_score
 * @property int $submitted_at
 * @property bool $archived
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Quiz $quiz
 */
class Response extends Entity
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
        'quiz_id' => true,
        'response_json' => true,
        'response_score' => true,
        'submitted_at' => true,
        'archived' => true,
        'user' => true,
        'quiz' => true,
    ];
}
