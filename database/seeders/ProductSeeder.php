<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = require database_path('seeders/data/bakery_products.php');

        DB::table('products')->insert(
            array_map(function (array $product) {
                return [
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                ];
            }, $products)
        );
    }
}
