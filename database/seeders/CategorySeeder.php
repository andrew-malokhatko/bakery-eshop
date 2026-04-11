<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'bread',
                'description' => 'Classic baked breads and loaves.',
            ],
            [
                'name' => 'cakes',
                'description' => 'Sweet cakes and cake-style desserts.',
            ],
            [
                'name' => 'pastries',
                'description' => 'Flaky pastries and soft bakery treats.',
            ],
            [
                'name' => 'cookies',
                'description' => 'Cookies and cookie boxes.',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
