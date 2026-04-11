<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategoryMap = [
            ['name' => 'Baguette', 'category' => 'bread'],
            ['name' => 'Country Bread Loaf', 'category' => 'bread'],
            ['name' => 'Sourdough Bread', 'category' => 'bread'],
            ['name' => 'Apple Pie', 'category' => 'cakes'],
            ['name' => 'Chocolate Cake', 'category' => 'cakes'],
            ['name' => 'Vanilla Cupcake', 'category' => 'cakes'],
            ['name' => 'Blueberry Muffin', 'category' => 'pastries'],
            ['name' => 'Chocolate Roll', 'category' => 'pastries'],
            ['name' => 'Cinnamon Bun', 'category' => 'pastries'],
            ['name' => 'Croissant', 'category' => 'pastries'],
            ['name' => 'Donut', 'category' => 'pastries'],
            ['name' => 'Strawberry Tart', 'category' => 'pastries'],
            ['name' => 'Cookies Box', 'category' => 'cookies'],
        ];

        $links = [];

        foreach ($productCategoryMap as $item) {
            $productId = DB::table('products')->where('name', $item['name'])->value('id');
            $categoryId = DB::table('categories')->where('name', $item['category'])->value('id');

            if ($productId && $categoryId) {
                $links[] = [
                    'product_id' => $productId,
                    'category_id' => $categoryId,
                ];
            }
        }

        DB::table('products_categories')->insert($links);
    }
}