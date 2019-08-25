<?php

namespace App\Http\Requests\API;

use App\Models\tourism_serv_prod_categories;
use InfyOm\Generator\Request\APIRequest;

class Createtourism_serv_prod_categoriesAPIRequest extends APIRequest
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
        return tourism_serv_prod_categories::$rules;
    }
}
