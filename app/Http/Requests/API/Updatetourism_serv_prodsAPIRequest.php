<?php

namespace App\Http\Requests\API;

use App\Models\tourism_serv_prods;
use InfyOm\Generator\Request\APIRequest;

class Updatetourism_serv_prodsAPIRequest extends APIRequest
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
        return tourism_serv_prods::$rules;
    }
}
