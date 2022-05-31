<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Models\Applicant;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    public function firstView()
    {
        return view('pages.permohonan.index');
    }

    public function firstSubmit(Request $request)
    {
        if ($request->applicant) {
            $result = [
                'url' => route('permohonan.third-view', [
                    'service' => $request->service,
                    'applicant' => $request->applicant
                ]),
            ];
        } else {
            $result = [
                'url' => route('permohonan.second-view', [
                    'service' => $request->service
                ]),
            ];
        }

        return $result;

        // return view('pages.permohonan.index', compact('service', 'applicant'));
    }

    public function secondView(Service $service, Applicant $applicant)
    {
        return view('pages.permohonan.index', compact('service', 'applicant'));
    }

    public function secondSubmit(ApplicantRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $applicant = Applicant::create($request->all());
            $applicant->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Berhasil disimpan',
                'url' => route('permohonan.third-view', [
                    'service' => $request->service,
                    'applicant' => $applicant->id
                ]),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json([
                'success' => false,
                'msg' => 'Gagal disimpan',
                'error' => $th->getMessage()
            ]);
        }
    }
}
