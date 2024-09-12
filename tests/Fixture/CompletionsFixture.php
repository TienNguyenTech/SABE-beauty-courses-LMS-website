<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompletionsFixture
 */
class CompletionsFixture extends TestFixture
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
                'completion_id' => 1,
                'user_id' => 1,
                'course_id' => 1,
                'completed_at' => 1726115410,
                'archived' => 1,
            ],
        ];
        parent::init();
    }
}
