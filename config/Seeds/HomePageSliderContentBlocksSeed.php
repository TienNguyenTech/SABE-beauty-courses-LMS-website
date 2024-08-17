<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageSliderContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Homepage Slider',
                'label' => 'homepage-top-image text 1',
                'description' => 'The text of the first image in the Pictures section is displayed at the top of the homepage',
                'slug' => 'home-slider-text-1',
                'type' => 'text',
                'value' => 'Shape Your Future in Beauty',
            ],
            [
                'parent' => 'Homepage Slider',
                'label' => 'homepage-top-image text 2',
                'description' => 'The text of the second image in the Pictures section is displayed at the top of the homepage',
                'slug' => 'home-slider-text-2',
                'type' => 'text',
                'value' => 'Where Creativity Meets Skill',
            ],
            [
                'parent' => 'Homepage Slider',
                'label' => 'homepage-top-image text 3',
                'description' => 'The text of the third image in the Pictures section is displayed at the top of the homepage',
                'slug' => 'home-slider-text-3',
                'type' => 'text',
                'value' => 'Hands-On Training, Real-World Experience',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
