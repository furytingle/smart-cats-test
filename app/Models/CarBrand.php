<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $table = 'car_brands';

    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = false;

    public function models()
    {
        return $this->hasMany(CarModel::class, 'carBrandId');
    }
}
