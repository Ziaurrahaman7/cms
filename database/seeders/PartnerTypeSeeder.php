<?php

namespace Database\Seeders;

use App\Models\PartnerType;
use Illuminate\Database\Seeder;

class PartnerTypeSeeder extends Seeder
{
    public function run(): void
    {
        $partnerTypes = [
            [
                'name' => 'Technology Partner',
                'slug' => 'technology',
                'description' => 'Partners providing technology solutions and integrations',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Business Partner', 
                'slug' => 'business',
                'description' => 'Strategic business partnerships and collaborations',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Strategic Partner',
                'slug' => 'strategic', 
                'description' => 'Long-term strategic partnerships for mutual growth',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Channel Partner',
                'slug' => 'channel',
                'description' => 'Distribution and sales channel partnerships',
                'sort_order' => 4,
                'is_active' => true
            ]
        ];

        foreach ($partnerTypes as $type) {
            PartnerType::updateOrCreate(
                ['slug' => $type['slug']],
                $type
            );
        }
    }
}