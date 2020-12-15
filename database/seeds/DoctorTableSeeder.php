<?php

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::create([
            'name' => 'admin test',
            'email' => 'admin@admin.com',
            'password' => bcrypt('11445522'),
            ]);

    }
}
