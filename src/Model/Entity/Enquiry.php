<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquiry Entity
 *
 * @property int $enquiry_id
 * @property string $enquiry_name
 * @property string $enquiry_email
 * @property string $enquiry_subject
 * @property string $enquiry_message
 * @property int $enquiry_seen
 * @property bool $archived
 * @property \Cake\I18n\DateTime $enquiry_datetime
 *
 * @property \App\Model\Entity\Enquiry[] $enquirys
 */
class Enquiry extends Entity
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
        'enquiry_name' => true,
        'enquiry_email' => true,
        'enquiry_subject' => true,
        'enquiry_message' => true,
        'enquiry_seen' => true,
        'enquirys' => true,
        'archived' => true,
        'enquiry_datetime' => true,
    ];
}
