<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'email' => 'required|email|string|unique:users,email,' . optional(request()->user)->id . ',id',
        ];

        if (request()->routeIs('admin.store') || request()->password) {
            $user['password'] = [
                'required',
                'string',
                'min:8',
                'confirmed'
            ];
            $user['password_confirmation'] = [
                'same:password'
            ];
        }

        return $user;
    }
}
