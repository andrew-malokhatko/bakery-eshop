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
            ['name' => 'Baguette', 'tags' => ['fresh-baked', 'artisan', 'breakfast']],
            ['name' => 'Country Bread Loaf', 'tags' => ['fresh-baked', 'artisan', 'breakfast']],
            ['name' => 'Sourdough Bread', 'tags' => ['artisan', 'crunchy']],
            ['name' => 'Apple Pie', 'tags' => ['flaky', 'party']],
            ['name' => 'Blueberry Muffin', 'tags' => ['fresh-baked', 'breakfast']],
            ['name' => 'Chocolate Cake', 'tags' => ['creamy', 'birthday']],
            ['name' => 'Chocolate Roll', 'tags' => ['flaky', 'party']],
            ['name' => 'Cinnamon Bun', 'tags' => ['fresh-baked', 'breakfast']],
            ['name' => 'Cookies Box', 'tags' => ['crunchy', 'gift-box']],
            ['name' => 'Croissant', 'tags' => ['fresh-baked', 'flaky', 'breakfast']],
            ['name' => 'Donut', 'tags' => ['creamy', 'party']],
            ['name' => 'Strawberry Tart', 'tags' => ['creamy', 'wedding']],
            ['name' => 'Vanilla Cupcake', 'tags' => ['creamy', 'birthday', 'gift-box']],
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
