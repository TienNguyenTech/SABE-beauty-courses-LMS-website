<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SessionsFixture
 */
class SessionsFixture extends TestFixture
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
                'session_id' => 1,
                'session_datetime' => '2024-08-07 01:55:48',
                'session_duration' => 1,
                'session_location' => 'Lorem ipsum dolor sit amet',
                'booking_id' => 1,
            ],
        ];
        parent::init();
    }
}
