<?php

namespace App\Http\Controllers;

use App\Models\N1n01;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DraftController extends Controller
{
    public function index()
    {
        // return view();
    }

    public function showAll()
    {
        $n1n01 = N1n01::with('service', 'applicant:id,nm_perusahaan,nama,alamat,province_id,city_id,district_id,village_id')
            ->select('id', 'no_register', 'applicant_id', 'service_id');

        return $n1n01;
    }

    public function datatable()
    {
        return DataTables::of($this->showAll())
            ->addIndexColumn()
            ->addColumn('applicant', function ($res) {
                return $res->applicant['nm_perusahaan'] ?? $res->applicant['nama'];
            })
            ->addColumn('service', function ($res) {
                return $res->service['name'];
            })
            ->addColumn('actions', function ($res) {
                $service = strtolower($res->service['category'] . $res->service['code']);

                $pgEdit = route('permohonan.third-view', [
                    'id' => $res->id,
                    'service' => $res->service_id,
                    'applicant' => $res->applicant_id,
                ]);
                $urlDelete = route($service . '.destroy', $res->id);

                return view('components.datatables.buttons', [
                    'pgEdit' => $pgEdit,
                    'urlDelete' => $urlDelete,
                ]);
            })
            ->rawColumns(['applicant'])
            ->make(true);
    }
}
