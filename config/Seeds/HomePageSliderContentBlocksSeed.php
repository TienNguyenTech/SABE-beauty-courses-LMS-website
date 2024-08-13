<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageSliderContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'South Adelaide Beauty and Education',
            ],
            [
                'parent' => 'global',
                'label' => 'Logo',
                'description' => 'Logo of your brand',
                'slug' => 'logo',
                'type' => 'image',
            ],
            [
                'parent' => 'global',
                'label' => 'Copyright Message',
                'description' => 'Copyright information shown at the bottom of the home page.',
                'slug' => 'copyright-message',
                'type' => 'text',
                'value' => 'Copyrights © 2024, South Adelaide Beauty and Education.',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
