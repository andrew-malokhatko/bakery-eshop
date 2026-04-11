<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'fresh-baked',
                'description' => 'Items baked fresh in-house every day.',
            ],
            [
                'name' => 'sweet',
                'description' => 'Sweet treats and dessert-style bakery items.',
            ],
            [
                'name' => 'flaky',
                'description' => 'Light, layered pastries with a crisp finish.',
            ],
            [
                'name' => 'artisan',
                'description' => 'Handcrafted breads with a rustic finish.',
            ],
            [
                'name' => 'chocolate',
                'description' => 'Products with rich chocolate flavor or filling.',
            ],
            [
                'name' => 'gift-box',
                'description' => 'Packed and ready for sharing or gifting.',
            ],
        ];

        DB::table('tags')->insert($tags);
    }
}
