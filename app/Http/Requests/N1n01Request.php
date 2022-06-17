<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class n1n01Request extends FormRequest
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
            'no_register' => 'nullable',
            'applicant_id' => 'required',
            'service_id' => 'required',
            'no_mohon' => 'nullable',
            'tgl_mohon' => 'nullable',
            'uraian' => 'nullable',
            'no_sk' => 'nullable',
            'urutan_sk' => 'nullable',
            'tgl_sk_terbit' => 'nullable',
            'tgl_sk_mulai' => 'nullable',
            'tgl_sk_akhir' => 'nullable',
            'signature_id_1' => 'nullable',
            'signature_id_2' => 'nullable',
            'notifikasi' => 'nullable',
            'cetak' => 'nullable',
            'flow' => 'nullable',
            'flowa' => 'nullable',
            'flow_status' => 'nullable',
            //
            'jenis_permohonan' => 'nullable',
            'nama_konsultan' => 'required',
            'telp_konsultan' => 'nullable',
            'alamat_konsultan' => 'nullable',
            'kegiatan_id' => 'required',
            'jenis_kegiatan_id' => 'required',
            'luas_lahan' => 'nullable',
            'luas_bangunan' => 'nullable',
            'jumlah_siswa' => 'nullable',
            'jumlah_unit' => 'nullable',
            'srp' => 'nullable',
            'lhr' => 'nullable',
            'bangkitan_id' => 'nullable',
            'alamat_kegiatan' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'narasi_lbr_akses_io' => 'nullable',
            'file_ba' => 'nullable',
            'tgl_ba' => 'nullable',
            'tgl_tinjau' => 'nullable',
            'tgl_sidang' => 'nullable',
        ];
    }
}
