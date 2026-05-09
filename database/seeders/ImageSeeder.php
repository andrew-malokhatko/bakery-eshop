<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = require database_path('seeders/data/bakery_products.php');

        $images = collect($products)
            ->unique('image')
            ->map(function (array $product) {
                return [
                    'url' => $product['image'],
                    'alt_text' => $product['name'],
                ];
            })
            ->values()
            ->all();

        DB::table('images')->insert($images);
    }
}
