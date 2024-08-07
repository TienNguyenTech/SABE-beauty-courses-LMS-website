<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'payment_id' => 1,
                'payment_amount' => 1.5,
                'payment_datetime' => '2024-08-07 01:55:40',
                'booking_id' => 1,
            ],
        ];
        parent::init();
    }
}
