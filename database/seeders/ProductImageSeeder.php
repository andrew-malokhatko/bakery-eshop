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
        $productImageMap = [
            ['name' => 'Apple Pie', 'url' => '/images/apple-pie.jpg'],
            ['name' => 'Baguette', 'url' => '/images/baguette.jpg'],
            ['name' => 'Blueberry Muffin', 'url' => '/images/blueberrie-muffin.jpg'],
            ['name' => 'Country Bread Loaf', 'url' => '/images/bread1.jpg'],
            ['name' => 'Chocolate Cake', 'url' => '/images/chocolate-cake.jpg'],
            ['name' => 'Chocolate Roll', 'url' => '/images/chocolate-roll.jpg'],
            ['name' => 'Cinnamon Bun', 'url' => '/images/cinnamon-bun.jpg'],
            ['name' => 'Cookies Box', 'url' => '/images/cookies-box.jpg'],
            ['name' => 'Croissant', 'url' => '/images/croissant.jpg'],
            ['name' => 'Donut', 'url' => '/images/donut.jpg'],
            ['name' => 'Sourdough Bread', 'url' => '/images/sourdough-bread.jpg'],
            ['name' => 'Strawberry Tart', 'url' => '/images/strawberry-tart.jpg'],
            ['name' => 'Vanilla Cupcake', 'url' => '/images/vanilla-cupcake.jpg'],
        ];

        $links = [];

        foreach ($productImageMap as $item) {
            $productId = DB::table('products')->where('name', $item['name'])->value('id');
            $imageId = DB::table('images')->where('url', $item['url'])->value('id');

            if ($productId && $imageId) {
                $links[] = [
                    'product_id' => $productId,
                    'image_id' => $imageId,
                ];
            }
        }

        if (! empty($links)) {
            DB::table('products_images')->insert($links);
        }
    }
}
