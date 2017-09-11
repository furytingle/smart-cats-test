<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'carBrandId',
        'carModelId',
        'categoryId',
        'price',
        'currency',
        'yearMade',
        'ownerName'
    ];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'carBrandId');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'carModelId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
