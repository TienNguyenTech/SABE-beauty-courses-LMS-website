<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursesFixture
 */
class CoursesFixture extends TestFixture
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
                'course_id' => 1,
                'course_name' => 'Lorem ipsum dolor sit amet',
                'course_description' => 'Lorem ipsum dolor sit amet',
                'course_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
