<?php

namespace App\Http\Requests\API;

use App\Models\tourism_event_committees;
use InfyOm\Generator\Request\APIRequest;

class Updatetourism_event_committeesAPIRequest extends APIRequest
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
        return tourism_event_committees::$rules;
    }
}
