<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContentsFixture
 */
class ContentsFixture extends TestFixture
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
                'content_id' => 1,
                'course_id' => 1,
                'content_type' => 'Lorem ipsum dolor ',
                'content_url' => 'Lorem ipsum dolor sit amet',
                'content_title' => 'Lorem ipsum dolor sit amet',
                'content_description' => 'Lorem ipsum dolor sit amet',
                'content_position' => 1,
                'archived' => 1,
            ],
        ];
        parent::init();
    }
}
