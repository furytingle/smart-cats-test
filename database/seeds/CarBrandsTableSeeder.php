<?php

use Illuminate\Database\Seeder;

class CarBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $audi = factory(\App\Model\CarBrand::class)->create([
            'name' => 'Audi',
        ])->models();
        $audi->save(factory(\App\Model\CarModel::class)->make(['name' => 'A6']));
        $audi->save(factory(\App\Model\CarModel::class)->make(['name' => 'A7']));
        $audi->save(factory(\App\Model\CarModel::class)->make(['name' => 'A8']));

        $bmw = factory(\App\Model\CarBrand::class)->create([
            'name' => 'BMW'
        ])->models();
        $bmw->save(factory(\App\Model\CarModel::class)->make(['name' => 'X3']));
        $bmw->save(factory(\App\Model\CarModel::class)->make(['name' => 'X5']));
        $bmw->save(factory(\App\Model\CarModel::class)->make(['name' => 'X6']));

        $mercedes = factory(\App\Model\CarBrand::class)->create([
            'name' => 'Mercedes'
        ])->models();
        $mercedes->save(factory(\App\Model\CarModel::class)->make(['name' => 'S500']));
        $mercedes->save(factory(\App\Model\CarModel::class)->make(['name' => 'S550']));
        $mercedes->save(factory(\App\Model\CarModel::class)->make(['name' => 'S600']));

        $citroen = factory(\App\Model\CarBrand::class)->create([
            'name' => 'Citroen'
        ])->models();
        $citroen->save(factory(\App\Model\CarModel::class)->make(['name' => 'C2']));
        $citroen->save(factory(\App\Model\CarModel::class)->make(['name' => 'C3']));
        $citroen->save(factory(\App\Model\CarModel::class)->make(['name' => 'C4']));
        $citroen->save(factory(\App\Model\CarModel::class)->make(['name' => 'C5']));
    }
}
