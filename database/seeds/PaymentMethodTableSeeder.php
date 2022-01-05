<?php

use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PaymentMethod::create(['name' => 'Bank Transfer']);
        \App\PaymentMethod::create(['name' => 'paypal']);
    }
}
