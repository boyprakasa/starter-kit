<?php

namespace App\Http\Requests;

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
            'status' => 'required',
        ];

        if (request()->password) {
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

        if (request()->routeIs('admin.store') || request()->routeIs('admin.update')) {
            $user['identity_number'] = [
                'required',
                'string',
                'unique:admin_profiles,identity_number,' . optional(request()->user)->id . ',user_id',
                'regex:/^[0-9]+$/u',
                'digits_between:16,16'
            ];
            $user['civil_servant_identity_number'] = [
                'required',
                'string',
                'unique:admin_profiles,civil_servant_identity_number,' . optional(request()->user)->id . ',user_id',
                'regex:/[0-9]+$/u',
                'between:21,21'
            ];
            $user['gender'] = 'required';
            $user['phone'] = 'nullable|min:10|max:16';
            $user['flow_id'] = 'nullable';
            $user['service'] = 'nullable';
            $user['role'] = 'nullable';
            $user['permission'] = 'nullable';
        }

        return $user;
    }
}
