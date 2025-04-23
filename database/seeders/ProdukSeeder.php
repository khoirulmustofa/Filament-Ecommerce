<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all kategori IDs
        $kategoriIds = DB::table('kategoris')->where('is_active', 1)->pluck('id')->toArray();
        
        // Get all brand IDs
        $brandIds = DB::table('brands')->where('is_active', 1)->pluck('id')->toArray();
        
        $products = [];
        
        for ($i = 0; $i < 100; $i++) {
            $name = $faker->words(rand(2, 4), true);
            $price = $faker->randomFloat(2, 10, 5000);
            
            $products[] = [
                'kategori_id' => $faker->randomElement($kategoriIds),
                'brand_id' => $faker->randomElement($brandIds),
                'name' => ucfirst($name),
                'slug' => Str::slug($name),
                'image' => rand(0, 3) > 0 ? $faker->numberBetween(1, 20) . '.jpg' : null,
                'description' => $faker->paragraph(rand(3, 6)),
                'price' => $price,
                'is_active' => $faker->boolean(80), // 80% chance to be active
                'is_featured' => $faker->boolean(20), // 20% chance to be featured
                'in_stock' => $faker->boolean(70), // 70% chance to be in stock
                'on_sale' => $faker->boolean(30), // 30% chance to be on sale
                'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
                'updated_at' => now(),
            ];
        }
        
        DB::table('produks')->insert($products);
    }
}