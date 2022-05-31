<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
        $applicant = [
            'member_id' => 'required|exists:member_profiles,id',
            'jns_pemohon' => 'required',

            'alamat' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',

            'npwp' => 'nullable',
            'telepon' => 'nullable',
            'fax' => 'nullable',
            'jabatan' => 'required',
            // 'gender' => 'required',
            'status' => 'nullable',

            'file_ktp' => 'nullable|mimes:pdf|max:10240', //required
            'file_npwp' => 'nullable|mimes:pdf|max:10240',

        ];

        if (request()->jns_pemohon !== '1') {
            [
                'bntk_perusahaan' => 'required',
                'jns_perusahaan' => 'required',
                'nib' => 'required',
                'nm_perusahaan' => 'required',

                'akta_no' => 'required',
                'notaris' => 'required',
                'tgl_akta' => 'required',
                'akta_no_lama' => 'nullable',
                'notaris_lama' => 'nullable',
                'tgl_akta_lama' => 'nullable',

                'nm_pj' => 'required',
                'alamat_pj' => 'required',
                'gender_pj' => 'required',

                'file_nib' => 'nullable|file|mimes:pdf|max:10240',
                'file_akta' => 'nullable|file|mimes:pdf|max:10240',
            ];
        } else {
            ['nama' => 'required'];
        }

        return $applicant;
    }
}
