<?php

namespace App\Http\Repositories;

use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Support\Facades\DB;

class CarRepository
{
    protected $orders = [
        'category' => 'categories.id',
        'brand' => 'car_brands.name',
        'model' => 'car_models.name',
        'price' => 'cars.price'
    ];

    public function getCars($yearAfter, $yearBefore, $order, $sequence = 'asc')
    {
        $query = Car::query();
        $query->join('categories', 'cars.categoryId', '=', 'categories.id');
        $query->join('car_brands', 'cars.carBrandId', '=', 'car_brands.id');
        $query->join('car_models', 'cars.carModelId', '=', 'car_models.id');

        if (key_exists($order, $this->orders)) {
            $query->orderBy($this->orders[$order], $sequence);
        }

        if (!is_null($yearAfter)) {
            $query->where('yearMade', '>=', $yearAfter);
        }

        if (!is_null($yearBefore)) {
            $query->where('yearMade', '<', $yearBefore);
        }

        $cars = $query->select(
            'cars.*',
            'categories.name as category',
            'car_models.name as model',
            'car_brands.name as brand')->get();

        //dd($cars);
        return $cars;
    }

    public function createCar(array $data)
    {
        $car = new Car();

        $car->carBrandId = $data['carBrand'];
        $car->carModelId = $data['carModel'];
        $car->categoryId = $this->findCategory($data['yearMade']);
        $car->price = $data['price'];
        $car->yearMade = $data['yearMade'];
        $car->ownerName = $data['ownerName'];

        $car->save();
    }

    public function getModels($brandId)
    {
        $models = CarModel::where('carBrandId', $brandId)
            ->select('id', 'name')
            ->get();

        if (count($models)) {
            return response()->json([
                'success' => true,
                'brands' => $models->toArray()
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid brandId'
        ]);
    }

    protected function findCategory($year)
    {
        $category = DB::select("SELECT id FROM categories WHERE (? < categories.before AND ? > categories.after)
                                                          OR (categories.after IS NULL AND ? < categories.before)
                                                          OR (categories.before IS NULL AND ? > categories.after);",
            [$year, $year, $year, $year]
        );

        if (!count($category)) {
            throw new \Exception('Invalid data');
        }

        $categoryId = array_shift($category)->id;

        return $categoryId;
    }
}