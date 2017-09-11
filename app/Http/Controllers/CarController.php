<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CarRepository;
use App\Http\Requests\CreateCarRequest;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->repository = new CarRepository();
    }

    public function search(Request $request)
    {
        $yearAfter = null;
        $yearBefore = null;

        $order = null;

        if ($request->has('yearAfter')) {
            $yearAfter = $request->get('yearAfter');
        }

        if ($request->has('yearBefore')) {
            $yearBefore = $request->get('yearBefore');
        }

        if ($request->has('order')) {
            $order = $request->get('order');
        }

        $cars = $this->repository->getCars($yearAfter, $yearBefore, $order);

        return view('public.car.index', [
            'cars' => $cars
        ]);
    }

    public function create()
    {
        $brands = CarBrand::all();

        return view('public.car.create', [
            'brands' => $brands
        ]);
    }

    public function store(CreateCarRequest $request)
    {
        $request->validate();

        $data = $request->all();

        try {
            $this->repository->createCar($data);
            $request->session()->flash('success', 'Авто добавлено');

            return redirect()->route('car.search');
        } catch (\Throwable $e) {
            $request->session()->flash('error', 'Ошибка: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function getBrands(Request $request)
    {
        $brandId = $request->get('brandId');

        return $this->repository->getModels($brandId);
    }
}