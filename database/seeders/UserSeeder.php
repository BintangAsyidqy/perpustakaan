<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data user baru untuk Administrator
        User::create([
            'name' => 'Administrator', 
            'email' => 'apotek_admin@gmail.com', 
            'password' => Hash::make('adminapotek'), 
            'type' => 'guru'
        ]);

        // Membuat data user baru untuk Murid
        User::create([
            'name' => 'Student User', 
            'email' => 'student_user@gmail.com', 
            'password' => Hash::make('studentpassword'), 
            'type' => 'murid'
        ]);
    }
}
