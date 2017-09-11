<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car_models';

    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'carBrandId');
    }
}
