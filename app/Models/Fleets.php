<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;
use App\Models\User;

class Fleets extends Model
{
    protected $fillable = [
        'car_name',
        'car_model',
        'car_plate',
        'car_color',
        'car_vin',
        'car_image',
        'kilometers',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
