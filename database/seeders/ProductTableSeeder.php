<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductDetail::truncate();
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $product_name = $faker->sentence();
            $product = Product::create([
                'product_name' => $product_name,
                'slug' => Str::slug($product_name, '-'),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(3, 1, 20)
            ]);
            $detail = $product->detail()->create([
                'show_slider' => rand(0, 1),
                'show_daily_deals' => rand(0, 1),
                'show_featured' => rand(0, 1),
                'show_bestseller' => rand(0, 1),
                'show_discounted' => rand(0, 1),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
