<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class BeautyByLisaContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Beauty By Lisa',
                'label' => 'beauty by lisa description',
                'description' => 'The description of the Beauty By Lisa section Follet section, where you can find the best beauty products and services.',
                'slug' => 'beauty-by-lisa-description',
                'type' => 'text',
                'value' => 'Welcome to Beauty by Lisa Follett, a home-based beauty sanctuary in Hallett Cove! With 20 years of
                    industry experience across England and Australia, I am dedicated to bringing you the best in beauty
                    therapy. I am also an educator in beauty therapy and I combine my expertise and passion for the
                    beauty industry to create a comfortable and welcoming environment for all my clients. Explore our
                    services and indulge in a personalized beauty experience designed just for you.',
            ],


        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
