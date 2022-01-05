<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'pro_name' => 'Pudol Duox',
            'pro_des' => 'This is the Worlds Best Product. If you buy this product, you dont need to eat food for a long time.Now its your choice!',
            'pro_price' => 20
        ]);

        Product::create([
            'pro_name' => 'Pudol Duox 2',
            'pro_des' => 'This is also the Worlds Best Product. If you buy this product, you dont need to eat food for a long time.Now its your choice!',
            'pro_price' => 30
        ]);

        Product::create([
            'pro_name' => 'Pudol Duox 3',
            'pro_des' => 'This is also the Worlds Best Product. If you buy this product, you dont need to eat food for a long time.Now its your choice!',
            'pro_price' => 50
        ]);
    }
}
