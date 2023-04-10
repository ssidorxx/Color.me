<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category'=>'Тонирующие маски', 'photo'=>'маски_категории.jpg'],
            ['category'=>'Техника', 'photo'=>'техника_категории.jpg'],
            ['category'=>'Уходовые средства', 'photo'=>'уход_категории.jpg'],
        ]);
    }
}
