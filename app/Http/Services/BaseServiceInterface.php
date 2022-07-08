<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

interface BaseServiceInterface
{
    public function findByName(string $name): ?Model;
}
