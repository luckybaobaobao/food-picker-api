<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class CuisineRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|alpha_num'
        ];
    }
}
