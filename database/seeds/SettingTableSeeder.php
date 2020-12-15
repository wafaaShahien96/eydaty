<?php

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Settings::create([
            'name' => 'doctor',
            'phone' =>'123456789',
            'address' =>'Mansoura University',
            'logo' =>'doctor.jpg',
            'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'FB_link' => 'doctor@facebook.com',
            'TW_link' => 'doctor@twitter.com',
            'email' => 'Doctor@admin.com',
             
            ]);
    }

}
