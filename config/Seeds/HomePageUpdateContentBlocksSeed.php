<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageUpdateContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Homepage Features List',
                'label' => 'feature title 1',
                'description' => 'The title of the first feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-title-1',
                'type' => 'text',
                'value' => 'International Expert Instructors',
            ],
            [
                'parent' => 'Homepage Features List',
                'label' => 'feature description 1',
                'description' => 'The description of the first feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-description-1',
                'type' => 'text',
                'value' => 'Learn from seasoned professionals in the industry.',
            ],

            [
                'parent' => 'Homepage Features List',
                'label' => 'feature title 2',
                'description' => 'The title of the second feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-title-2',
                'type' => 'text',
                'value' => 'Flexible Classes',
            ],
            [
                'parent' => 'Homepage Features List',
                'label' => 'feature description 2',
                'description' => 'The description of the second feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-description-2',
                'type' => 'text',
                'value' => 'Day, evening, and weekend classes available.',
            ],

            [
                'parent' => 'Homepage Features List',
                'label' => 'feature title 3',
                'description' => 'The title of the third feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-title-3',
                'type' => 'text',
                'value' => 'Comprehensive Curriculum',
            ],
            [
                'parent' => 'Homepage Features List',
                'label' => 'feature description 3',
                'description' => 'The description of the third feature in the Features section, is displayed under the slider of homepage',
                'slug' => 'feature-description-3',
                'type' => 'text',
                'value' => 'Covering all aspects of cosmetology, from basics to advanced techniques.',
            ],

        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
