<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $user = User::create([
            'name' => 'Admin', 
            'email' => 'singhamit984537@gmail.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
            'role' => 'admin',
            'email_verified_at' => Carbon::now(),
        ]);
       
    }
}
