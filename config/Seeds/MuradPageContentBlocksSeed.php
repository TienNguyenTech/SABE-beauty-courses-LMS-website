<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class MuradPageContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Murad Section',
                'label' => 'homepage-murad image 1',
                'description' => 'The first image shown in the home page murad section.',
                'slug' => 'homepage-murad-image-1',
                'type' => 'image',
            ],

            [
                'parent' => 'Murad Section',
                'label' => 'homepage-murad image 2',
                'description' => 'The second image shown in the home page murad section.',
                'slug' => 'homepage-murad-image-2',
                'type' => 'image',
            ],

            [
                'parent' => 'Murad Section',
                'label' => 'homepage-murad image 3',
                'description' => 'The third image shown in the home page murad section.',
                'slug' => 'homepage-murad-image-3',
                'type' => 'image',
            ],

            [
                'parent' => 'Murad Section',
                'label' => 'murad-page description',
                'description' => 'The description shown in the murad page.',
                'slug' => 'murad-description',
                'type' => 'text',
                'value' => 'Murad is the dermatologist-developed brand that approaches skin differently. How? Through founder Dr. Howard Murad’s four main pillars of wellness for total skin health: 1) “eat your water,” 2) “awaken your body,” 3) “be kind to your mind” and, of course, 4) “nourish your skin” with our high-performance technologies and formulas. Because we believe skincare is healthcare and selfcare.',
            ],

            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 1',
                'description' => 'The image 1 shown in the murad page.',
                'slug' => 'murad-image-1',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 2',
                'description' => 'The image 2 shown in the murad page.',
                'slug' => 'murad-image-2',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 3',
                'description' => 'The image 3 shown in the murad page.',
                'slug' => 'murad-image-3',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 4',
                'description' => 'The image 4 shown in the murad page.',
                'slug' => 'murad-image-4',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 5',
                'description' => 'The image 5 shown in the murad page.',
                'slug' => 'murad-image-5',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page image 6',
                'description' => 'The image 6 shown in the murad page.',
                'slug' => 'murad-image-6',
                'type' => 'image',
            ],
            [
                'parent' => 'Murad Section',
                'label' => 'murad page banner',
                'description' => 'The banner image shown in the murad page.',
                'slug' => 'murad-image-banner',
                'type' => 'image',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
