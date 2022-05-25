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
        return redirect()->route('permohonan.second-view', [
            'service' => $request->service,
            'applicant' => $request->applicant,
        ]);
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
            return view('pages.permohonan.second', compact('service', 'applicant'));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
