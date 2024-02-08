<?php

namespace App\Http\Requests\API;

use App\Models\Nasabah;
use InfyOm\Generator\Request\APIRequest;

class UpdateNasabahAPIRequest extends APIRequest
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
        $rules = Nasabah::$rules;
        
        return $rules;
    }
}
