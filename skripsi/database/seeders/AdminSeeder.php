<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\user::insert([
        [
            'name'=>'administrator',
            'email'=>'admin1@email.com',
            'password'=>bcrypt(12345)
        ],
    ]);
    }
}
