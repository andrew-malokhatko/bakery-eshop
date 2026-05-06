<?php

namespace Database\Seeders;

use App\TagType;
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
                'type' => TagType::TEXTURE->value,
            ],
            [
                'name' => 'flaky',
                'description' => 'Light, layered pastries with a crisp finish.',
                'type' => TagType::TEXTURE->value,
            ],
            [
                'name' => 'creamy',
                'description' => 'Smooth cream fillings or silky frosting textures.',
                'type' => TagType::TEXTURE->value,
            ],
            [
                'name' => 'crunchy',
                'description' => 'Crunchy crust, topping, or bite.',
                'type' => TagType::TEXTURE->value,
            ],
            [
                'name' => 'artisan',
                'description' => 'Handcrafted breads with a rustic finish.',
                'type' => TagType::TEXTURE->value,
            ],
            [
                'name' => 'birthday',
                'description' => 'Perfect pick for birthday celebrations.',
                'type' => TagType::OCCASION->value,
            ],
            [
                'name' => 'wedding',
                'description' => 'Elegant choice for wedding tables and gifts.',
                'type' => TagType::OCCASION->value,
            ],
            [
                'name' => 'gift-box',
                'description' => 'Packed and ready for sharing or gifting.',
                'type' => TagType::OCCASION->value,
            ],
            [
                'name' => 'party',
                'description' => 'Crowd-pleasing option for parties and events.',
                'type' => TagType::OCCASION->value,
            ],
            [
                'name' => 'breakfast',
                'description' => 'A great fit for breakfast and brunch.',
                'type' => TagType::OCCASION->value,
            ],
        ];

        DB::table('tags')->insert($tags);
    }
}
