<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTagMap = [
            ['name' => 'Baguette', 'tags' => ['fresh-baked', 'artisan']],
            ['name' => 'Country Bread Loaf', 'tags' => ['fresh-baked', 'artisan']],
            ['name' => 'Sourdough Bread', 'tags' => ['fresh-baked', 'artisan']],
            ['name' => 'Apple Pie', 'tags' => ['sweet', 'flaky']],
            ['name' => 'Blueberry Muffin', 'tags' => ['sweet', 'fresh-baked']],
            ['name' => 'Chocolate Cake', 'tags' => ['sweet', 'chocolate']],
            ['name' => 'Chocolate Roll', 'tags' => ['flaky', 'chocolate']],
            ['name' => 'Cinnamon Bun', 'tags' => ['sweet', 'fresh-baked']],
            ['name' => 'Cookies Box', 'tags' => ['sweet', 'gift-box']],
            ['name' => 'Croissant', 'tags' => ['fresh-baked', 'flaky']],
            ['name' => 'Donut', 'tags' => ['sweet']],
            ['name' => 'Strawberry Tart', 'tags' => ['sweet', 'flaky']],
            ['name' => 'Vanilla Cupcake', 'tags' => ['sweet', 'gift-box']],
        ];

        $links = [];

        foreach ($productTagMap as $item) {
            $productId = DB::table('products')->where('name', $item['name'])->value('id');

            foreach ($item['tags'] as $tagName) {
                $tagId = DB::table('tags')->where('name', $tagName)->value('id');

                if ($productId && $tagId) {
                    $links[] = [
                        'product_id' => $productId,
                        'tag_id' => $tagId,
                    ];
                }
            }
        }

        DB::table('products_tags')->insert($links);
    }
}
