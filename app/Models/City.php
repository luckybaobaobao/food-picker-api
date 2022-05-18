<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'city_id');
    }
}
