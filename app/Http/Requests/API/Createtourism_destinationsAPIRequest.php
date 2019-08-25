<?php

namespace App\Http\Requests\API;

use App\Models\tourism_destinations;
use InfyOm\Generator\Request\APIRequest;

class Createtourism_destinationsAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return tourism_destinations::$rules;
    }
}
