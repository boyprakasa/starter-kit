<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Models\AdminProfile;
use App\Models\Applicant;
use App\Models\Service;
use App\Models\User;
use App\Notifications\Permohonan\Internal\NewDocument;
use App\Traits\PermitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    use PermitLog;

    public function firstView()
    {
        return view('pages.permohonan.index');
    }

    public function firstSubmit(Request $request)
    {
        $request->validate([
            'service' => 'required',
        ]);

        try {
            if ($request->applicant) {
                $result = [
                    'message' => 'Silahkan Isi Data Permohonan!',
                    'url' => route('permohonan.third-view', [
                        'service' => $request->service,
                        'applicant' => $request->applicant
                    ]),
                ];
            } else {
                $result = [
                    'message' => 'Silahkan Isi Data Pemohon!',
                    'url' => route('permohonan.second-view', [
                        'service' => $request->service
                    ]),
                ];
            }
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
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

    public function thirdView(Service $service, Applicant $applicant)
    {
        return view('pages.permohonan.index', compact('service', 'applicant'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'aggrement' => 'required',
            'service' => 'required',
            'id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $izin = $request->service::find($request->id);

            $izin->update([
                'flow' => 1,
                'flowa' => 'Internal',
                'flow_status' => 'Setuju'
            ]);

            $this->submitLog($request, $izin);

            DB::commit();

            // Email Notif CS
            $frontOffices = AdminProfile::with('user')->where('flow_id', 1)->get();
            foreach ($frontOffices as $key => $frontOffice) {
                $frontOffice->user->notify(new NewDocument($izin->service->name, $izin->applicant->nm_perusahaan ?? $izin->applicant->nama, $izin->no_register));
            }

            return response()->json([
                'success' => true,
                'message' => 'Berhasil dikirim'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
