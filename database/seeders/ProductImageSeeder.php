<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
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
            $imageId = DB::table('images')->where('url', $product['image'])->value('id');

            if ($productId && $imageId) {
                $links[] = [
                    'product_id' => $productId,
                    'image_id' => $imageId,
                ];
            }
        }

        DB::table('products_images')->insert($links);
    }
}
