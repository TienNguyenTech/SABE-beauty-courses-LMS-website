<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class HomePageMeetLisaContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Homepage Meet Lisa',
                'label' => 'Paragraph 1',
                'description' => 'The first paragraph in the Meet Lisa section',
                'slug' => 'meet-lisa-paragraph-1',
                'type' => 'text',
                'value' => 'I\'m Lisa, the CEO of South Adelaide Beauty and Education, I have over two decades of experience as a beauty therapist. I am armed with a current diploma in Beauty Therapy and a cert 4 in Training and Assessment with many years of teaching experience. I\’m extremely passionate about delivering quality training that will enhance the overall standard of our beauty industry.',
            ],
            [
                'parent' => 'Homepage Meet Lisa',
                'label' => 'Paragraph 2',
                'description' => 'The second paragraph in the Meet Lisa section',
                'slug' => 'meet-lisa-paragraph-2',
                'type' => 'text',
                'value' => 'It might surprise you that the beauty industry remains largely unregulated, allowing individuals to claim the title of a beauty therapist after merely watching a YouTube video. At South Adelaide Beauty & Education, we\'re working to ensure that the therapists out there are of the highest quality.',
            ],

        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
