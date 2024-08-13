<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageSliderContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider background 1',
                'description' => 'The background shown in the home page slider 1.',
                'slug' => 'home-slider-background-1',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider text 1',
                'description' => 'The text shown in the home page slider 1.',
                'slug' => 'home-slider-text-1',
                'type' => 'text',
                'value' => 'Shape Your Future in Beauty',
            ],
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider background 2',
                'description' => 'The background shown in the home page slider 2.',
                'slug' => 'home-slider-background-2',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider text 2',
                'description' => 'The text shown in the home page slider 2.',
                'slug' => 'home-slider-text-2',
                'type' => 'text',
                'value' => 'Where Creativity Meets Skill',
            ],
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider background 3',
                'description' => 'The background shown in the home page slider 3.',
                'slug' => 'home-slider-background-3',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage slider',
                'label' => 'homepage-slider text 3',
                'description' => 'The text shown in the home page slider 3.',
                'slug' => 'home-slider-text-3',
                'type' => 'text',
                'value' => 'Hands-On Training, Real-World Experience',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
