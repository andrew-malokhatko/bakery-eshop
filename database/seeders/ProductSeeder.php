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
        $products = [
            [
                'name' => 'Apple Pie',
                'description' => 'Classic apple pie with spiced filling and flaky buttery crust.',
                'price' => 12.90,
                'quantity' => 18,
            ],
            [
                'name' => 'Baguette',
                'description' => 'Traditional French baguette with a crispy crust and airy crumb.',
                'price' => 3.40,
                'quantity' => 45,
            ],
            [
                'name' => 'Blueberry Muffin',
                'description' => 'Soft vanilla muffin loaded with juicy blueberries.',
                'price' => 2.95,
                'quantity' => 30,
            ],
            [
                'name' => 'Country Bread Loaf',
                'description' => 'Rustic everyday bread loaf baked for sandwiches and toast.',
                'price' => 4.20,
                'quantity' => 22,
            ],
            [
                'name' => 'Chocolate Cake',
                'description' => 'Rich layered chocolate cake with smooth cocoa frosting.',
                'price' => 24.90,
                'quantity' => 10,
            ],
            [
                'name' => 'Chocolate Roll',
                'description' => 'Tender rolled pastry with creamy chocolate filling.',
                'price' => 4.80,
                'quantity' => 20,
            ],
            [
                'name' => 'Cinnamon Bun',
                'description' => 'Soft bun swirled with cinnamon sugar and sweet glaze.',
                'price' => 3.50,
                'quantity' => 28,
            ],
            [
                'name' => 'Cookies Box',
                'description' => 'Assorted butter and chocolate chip cookies in a gift box.',
                'price' => 9.90,
                'quantity' => 16,
            ],
            [
                'name' => 'Croissant',
                'description' => 'Light and flaky all-butter croissant baked fresh daily.',
                'price' => 2.80,
                'quantity' => 40,
            ],
            [
                'name' => 'Donut',
                'description' => 'Yeast-raised donut with vanilla icing and colorful sprinkles.',
                'price' => 2.60,
                'quantity' => 35,
            ],
            [
                'name' => 'Sourdough Bread',
                'description' => 'Naturally leavened sourdough with deep flavor and chewy crust.',
                'price' => 5.70,
                'quantity' => 18,
            ],
            [
                'name' => 'Strawberry Tart',
                'description' => 'Buttery tart shell filled with cream and fresh strawberries.',
                'price' => 6.40,
                'quantity' => 0,
            ],
            [
                'name' => 'Vanilla Cupcake',
                'description' => 'Moist vanilla cupcake topped with whipped buttercream.',
                'price' => 3.10,
                'quantity' => 26,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
