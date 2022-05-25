<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            Applicant::create($request->all());
            DB::commit();
            return response()->json(['message' => 'Applicant created successfully'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['message' => 'Applicant not created'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantRequest $request, Applicant $applicant)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $applicant->update($request->all());
            DB::commit();
            return response()->json(['message' => 'Applicant updated successfully'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['message' => 'Applicant not updated'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
