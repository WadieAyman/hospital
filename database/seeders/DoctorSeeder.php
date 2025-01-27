<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctor::create([
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make(123456),
            'phoneNumber' =>'970598174561',
        ]);
    }
}
