<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Fleets;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'email',
        'phone',
        'description',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'active',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fleets()
    {
        return $this->hasMany(Fleets::class);
    }
}
