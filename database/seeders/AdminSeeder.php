<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@test.com',
            'email_verified_at'=>now(),
            'phone'=>'123456',
            'password'=> Hash::make('123456'),
            'role_id'=>1

        ]);

           $user->save();
           //$user->assignRole('admin');
    }
}
