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
        $products = require database_path('seeders/data/bakery_products.php');

        $links = [];

        foreach ($products as $product) {
            $productId = DB::table('products')->where('name', $product['name'])->value('id');

            foreach ($product['tags'] as $tagName) {
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
