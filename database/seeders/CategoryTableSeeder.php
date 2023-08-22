<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category')->truncate();
        $id = DB::table('category')->insertGetId(['category_name' => 'Elektronik', 'slug' => 'elektronik']);
        DB::table('category')->insert([
            'category_name' => 'Bilgisayar/Tablet',
            'slug' => 'bilgisayar-tablet',
            'parent_id' => $id
        ]);

        DB::table('category')->insert(['category_name' => 'Beyaz Eşya', 'slug' => 'elektronik']);
        DB::table('category')->insert(['category_name' => 'Kıyafet', 'slug' => 'Giyim']);
        DB::table('category')->insert(['category_name' => 'Araba', 'slug' => 'arac']);
        DB::table('category')->insert(['category_name' => 'Gemi', 'slug' => 'arac']);
        DB::table('category')->insert(['category_name' => 'Kitap', 'slug' => 'arac']);
        DB::table('category')->insert(['category_name' => 'Dergi', 'slug' => 'arac']);
        DB::table('category')->insert(['category_name' => 'Kozmetik', 'slug' => 'arac']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
