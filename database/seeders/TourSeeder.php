<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        
        $tours = [
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-K2BC',
                'title' => 'K2 Base Camp Trek',
                'slug' => 'k2-base-camp-trek',
                'short_description' => 'The ultimate trek to the base of the world\'s second-highest mountain.',
                'description' => 'Experience the ultimate adventure to the base of K2 through the stunning Baltoro Glacier.',
                'destination' => 'K2',
                'region' => 'Baltoro Glacier',
                'country' => 'Pakistan',
                'duration_days' => 20,
                'duration_nights' => 19,
                'difficulty' => 'strenuous',
                'base_price' => 4500.00,
                'sale_price' => 3999.00,
                'max_group_size' => 12,
                'min_group_size' => 4,
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
            ],
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-HUNZA',
                'title' => 'Hunza Valley Explorer',
                'slug' => 'hunza-valley-explorer',
                'short_description' => 'Discover the legendary Hunza Valley and its stunning landscapes.',
                'description' => 'Explore the enchanting Hunza Valley, famous for its breathtaking scenery.',
                'destination' => 'Hunza',
                'region' => 'Gilgit-Baltistan',
                'country' => 'Pakistan',
                'duration_days' => 10,
                'duration_nights' => 9,
                'difficulty' => 'easy',
                'base_price' => 1500.00,
                'sale_price' => 1350.00,
                'max_group_size' => 16,
                'min_group_size' => 2,
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
            ],
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-CONCO',
                'title' => 'Concordia & Gondogoro La',
                'slug' => 'concordia-gondogoro-la',
                'short_description' => 'Experience the legendary Concordia with views of 4 eight-thousanders.',
                'description' => 'Concordia offers views of four of the world\'s fourteen 8,000-meter peaks.',
                'destination' => 'Concordia',
                'region' => 'Karakoram',
                'country' => 'Pakistan',
                'duration_days' => 18,
                'duration_nights' => 17,
                'difficulty' => 'challenging',
                'base_price' => 3800.00,
                'sale_price' => null,
                'max_group_size' => 10,
                'min_group_size' => 4,
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
            ],
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-EVEREST',
                'title' => 'Everest Base Camp',
                'slug' => 'everest-base-camp',
                'short_description' => 'Trek to the base of the world\'s highest mountain.',
                'description' => 'Journey to the base camp of Mount Everest through Sherpa villages.',
                'destination' => 'Everest',
                'region' => 'Khumbu',
                'country' => 'Nepal',
                'duration_days' => 14,
                'duration_nights' => 13,
                'difficulty' => 'challenging',
                'base_price' => 3200.00,
                'sale_price' => null,
                'max_group_size' => 12,
                'min_group_size' => 4,
                'is_featured' => 1,
                'status' => 'published',
                'published_at' => $now,
            ],
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-FAIRY',
                'title' => 'Fairy Meadows Trek',
                'slug' => 'fairy-meadows-trek',
                'short_description' => 'Trek to magical Fairy Meadows with views of Nanga Parbat.',
                'description' => 'Fairy Meadows offers stunning views of Nanga Parbat.',
                'destination' => 'Fairy Meadows',
                'region' => 'Raikot',
                'country' => 'Pakistan',
                'duration_days' => 8,
                'duration_nights' => 7,
                'difficulty' => 'moderate',
                'base_price' => 950.00,
                'sale_price' => null,
                'max_group_size' => 14,
                'min_group_size' => 2,
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
            ],
            [
                'uuid' => Str::uuid(),
                'sku' => 'TOUR-SKARDU',
                'title' => 'Skardu Valley Tour',
                'slug' => 'skardu-valley-tour',
                'short_description' => 'Discover the wonders of Skardu, gateway to the high Karakoram.',
                'description' => 'Explore Skardu\'s natural beauty and ancient monasteries.',
                'destination' => 'Skardu',
                'region' => 'Baltistan',
                'country' => 'Pakistan',
                'duration_days' => 7,
                'duration_nights' => 6,
                'difficulty' => 'easy',
                'base_price' => 850.00,
                'sale_price' => null,
                'max_group_size' => 12,
                'min_group_size' => 2,
                'is_featured' => 0,
                'status' => 'published',
                'published_at' => $now,
            ],
        ];

        foreach ($tours as $tour) {
            DB::table('tours')->insert($tour);
        }

        $this->command->info('Created ' . count($tours) . ' tours successfully!');
    }
}