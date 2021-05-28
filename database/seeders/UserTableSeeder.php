<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
              'UserName'=>'ndirituedwin',
                'UserPwd'=>Hash::make('ndiritu.edwin018@gmail.com'), 
            ]);
        
    }
}
