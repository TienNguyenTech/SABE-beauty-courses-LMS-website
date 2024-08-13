<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageProgramContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program image 1',
                'description' => 'The image shown in the home page program 1.',
                'slug' => 'home-program-image-1',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program title 1',
                'description' => 'The title shown in the home page program 1.',
                'slug' => 'home-program-title-1',
                'type' => 'text',
                'value' => 'Back to Basics: Facials',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program description 1',
                'description' => 'The description shown in the home page program 1.',
                'slug' => 'home-program-description-1',
                'type' => 'text',
                'value' => 'Learn the Fundamentals of performing Facials',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program price 1',
                'description' => 'The price shown in the home page program 1.',
                'slug' => 'home-program-price-1',
                'type' => 'text',
                'value' => '199$',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program image 2',
                'description' => 'The image shown in the home page program 2.',
                'slug' => 'home-program-image-2',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program title 2',
                'description' => 'The title shown in the home page program 2.',
                'slug' => 'home-program-title-2',
                'type' => 'text',
                'value' => 'Back to Basics: Lash & Brow',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program description 2',
                'description' => 'The description shown in the home page program 2.',
                'slug' => 'home-program-description-2',
                'type' => 'text',
                'value' => 'Master the techniques needed to elevate your lash and brow artistry',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program price 2',
                'description' => 'The price shown in the home page program 2.',
                'slug' => 'home-program-price-2',
                'type' => 'text',
                'value' => '199$',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program image 3',
                'description' => 'The image shown in the home page program 3.',
                'slug' => 'home-program-image-3',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program title 3',
                'description' => 'The title shown in the home page program 3.',
                'slug' => 'home-program-title-3',
                'type' => 'text',
                'value' => 'Total Care: Waxing Essentials',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program description 3',
                'description' => 'The description shown in the home page program 3.',
                'slug' => 'home-program-description-3',
                'type' => 'text',
                'value' => 'Precision and Expertise: Achieve Waxing excellence',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program price 3',
                'description' => 'The price shown in the home page program 3.',
                'slug' => 'home-program-price-3',
                'type' => 'text',
                'value' => '499$',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program image 4',
                'description' => 'The image shown in the home page program 4.',
                'slug' => 'home-program-image-4',
                'type' => 'image',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program title 4',
                'description' => 'The title shown in the home page program 4.',
                'slug' => 'home-program-title-4',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program description 4',
                'description' => 'The description shown in the home page program 4.',
                'slug' => 'home-program-description-4',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'homepage program',
                'label' => 'homepage-program price 4',
                'description' => 'The price shown in the home page program 4.',
                'slug' => 'home-program-price-4',
                'type' => 'text',
                'value' => '$',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
