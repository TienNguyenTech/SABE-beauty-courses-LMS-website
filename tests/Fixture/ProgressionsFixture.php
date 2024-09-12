<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProgressionsFixture
 */
class ProgressionsFixture extends TestFixture
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
                'progression_id' => 1,
                'user_id' => 1,
                'content_id' => 1,
                'is_completed' => 1,
                'completed_at' => 1726115429,
                'archived' => 1,
            ],
        ];
        parent::init();
    }
}
