<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Patient::create([
            'name' => 'Patient',
            'email' => 'patient@gmail.com',
            'password' => Hash::make(123456),
            'phoneNumber' => '970598434511',
            'age' => 30,
            'gender' => 'Male',
            'problem' => '',
            'entrancDate' => now()->addDays(7),
        ]);
    }
}
