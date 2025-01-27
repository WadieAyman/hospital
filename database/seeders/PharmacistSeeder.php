<?php

namespace Database\Seeders;

use App\Models\Pharmacist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PharmacistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pharmacist::create([
            'name' => 'Pharmacist',
            'email' => 'pharmacist@gmail.com',
            'password' => Hash::make(123456),
            'phoneNumber' => '970598434511',
        ]);
    }
}
