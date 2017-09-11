<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'До 1990 года выпуска',
                'after' => null,
                'before' => 1990,
            ],
            [
                'name' => 'От 1990 до 2000 года выпуска',
                'after' => 1990,
                'before' => 2000
            ],
            [
                'name' => 'От 2000 до 2010 года выпуска',
                'after' => 2000,
                'before' => 2010
            ],
            [
                'name' => 'После 2010 года выпуска',
                'after' => 2010,
                'before' => null
            ]
        ]);
    }
}
