<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => Rule::requiredIf($this->method() == 'POST'),
            'status' => 'required',
            'position' => 'required',
            'tier' => 'required',
            'rank' => 'required',
            'header' => 'required',
            'title1' => 'nullable',
            'title2' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
