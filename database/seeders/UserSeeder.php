<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Anna', 'login'=>'P2A', 'email'=>'moon.kek@yandex.ru', 'password'=>'123456', 'created_at'=>now(), 'updated_at'=>now()],
        ]);
    }
}
