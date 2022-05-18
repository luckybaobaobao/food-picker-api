<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table = 'cuisines';

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
        return $this->hasMany(Restaurant::class, 'cuisine_id');
    }
}
