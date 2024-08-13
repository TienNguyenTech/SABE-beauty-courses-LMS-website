<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnquirysFixture
 */
class EnquirysFixture extends TestFixture
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
                'enquiry_id' => 1,
                'enquiry_name' => 'Lorem ipsum dolor sit amet',
                'enquiry_email' => 'Lorem ipsum dolor sit amet',
                'enquiry_subject' => 'Lorem ipsum dolor sit amet',
                'enquiry_message' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
