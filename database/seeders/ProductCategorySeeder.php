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
        $products = require database_path('seeders/data/bakery_products.php');

        $links = [];

        foreach ($products as $product) {
            $productId = DB::table('products')->where('name', $product['name'])->value('id');
            $categoryId = DB::table('categories')->where('name', $product['category'])->value('id');

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