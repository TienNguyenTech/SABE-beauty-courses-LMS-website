<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class GlobalContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Website Essentials',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'South Adelaide Beauty and Education',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Logo',
                'description' => 'Logo of your brand',
                'slug' => 'logo',
                'type' => 'image',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Copyright Message',
                'description' => 'Copyright information shown at the bottom of the home page.',
                'slug' => 'copyright-message',
                'type' => 'text',
                'value' => '2024, South Adelaide Beauty and Education.',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Contact Phone Number',
                'description' => 'The contact phone number that shown on contact us page.',
                'slug' => 'contact-phone',
                'type' => 'text',
                'value' => '0000000000',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Contact Email',
                'description' => 'The contact email that shown on contact us page.',
                'slug' => 'contact-email',
                'type' => 'text',
                'value' => 'beautybylisafollett@gmail.com',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Location-Address',
                'description' => 'The address for your place, shown on contact us page.',
                'slug' => 'location-address',
                'type' => 'text',
                'value' => 'Lepena Cresent',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Location-Suburb',
                'description' => 'The suburb for your place, shown on contact us page.',
                'slug' => 'location-suburb',
                'type' => 'text',
                'value' => 'Hallet Cove',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Location-State',
                'description' => 'The state for your place, shown on contact us page.',
                'slug' => 'location-state',
                'type' => 'text',
                'value' => 'South Australia',
            ],
            [
                'parent' => 'Website Essentials',
                'label' => 'Location-postcode',
                'description' => 'The postcode for your place, shown on contact us page.',
                'slug' => 'location-postcode',
                'type' => 'text',
                'value' => '5138',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
