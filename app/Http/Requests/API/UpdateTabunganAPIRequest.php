<?php

namespace App\Http\Requests\API;

use App\Models\Tabungan;
use InfyOm\Generator\Request\APIRequest;

class UpdateTabunganAPIRequest extends APIRequest
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
        $rules = Tabungan::$rules;
        
        return $rules;
    }
}
