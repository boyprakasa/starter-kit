<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementsRequest;
use App\Models\Requirements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.master.requirements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requirements = new Requirements();
        return view('pages.master.requirements.form', compact('requirements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementsRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            Requirements::create($request->all());
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function show(Requirements $requirements)
    {
        return view('pages.master.requirements.show', compact('requirements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirements $requirements)
    {
        return view('pages.master.requirements.form', compact('requirements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementsRequest $request, Requirements $requirements)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $requirements->update($request->all());
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirements $requirements)
    {
        DB::beginTransaction();
        try {
            $requirements->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function datatable()
    {
        return datatables()->of(Requirements::query())
            ->addIndexColumn()
            ->addColumn('action', function ($requirements) {
                return view('components.datatables.buttons', [
                    'title' => 'Syarat',
                    'urlEdit' => route('requirements.edit', $requirements->id),
                    'urlDelete' => route('requirements.destroy', $requirements->id),
                ]);
            })
            ->toJson();
    }
}
