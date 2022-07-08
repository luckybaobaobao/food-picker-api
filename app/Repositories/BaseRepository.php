<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = resolve($this->modelClassName);
    }
    
    public function findByName(?string $name): ?Model
    {
        if (!$name) {
            return null;
        }
        
        return $this->model->where('name', $name)->first();
    }
}
