<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
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
        return [
            'manager' => ['required', 'unique:stations,user_id,' . $this->id],
            'name' => ['required', 'unique:stations,name,' . $this->id],
            'phone' => ['required', 'unique:stations,phone,' . $this->id ],
        ];
    }
}
