<?php

use Illuminate\Database\Seeder;
use App\Models\Pricing;

class PricingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricing = Pricing::create([
            'feas' => '100',
            'home_feas' => '125',
            'agence_feas'=> '150',
            'follow_up' => '40'
            ]);
    }
}
