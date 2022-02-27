<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // create super admin user seeder
      $user = User::create([
            'name'=>'admin',
            'email'=> 'admin@admin.com',
            'password'=>bcrypt(123456789)
      ]);
      $user->attachRole('superadministrator');
    }
}
