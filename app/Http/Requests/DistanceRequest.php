<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class DistanceRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
    }
}
