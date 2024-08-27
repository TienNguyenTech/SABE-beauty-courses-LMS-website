<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $payment_id
 * @property string $payment_amount
 * @property \Cake\I18n\DateTime $payment_datetime
 * @property int $booking_id
 * @property string $checkout_id
 *
 * @property \App\Model\Entity\Booking $booking
 */
class Payment extends Entity
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
        'payment_amount' => true,
        'payment_datetime' => true,
        'booking_id' => true,
        'booking' => true,
        'checkout_id' => true,
    ];
}
