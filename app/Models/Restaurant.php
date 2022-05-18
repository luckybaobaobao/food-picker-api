<?php

namespace App\Models;

use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_key',
        'name',
        'latitude',
        'longitude',
        'cuisine_id',
        'city_id',
    ];

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
