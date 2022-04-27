<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.information.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $information = new Information();
        return view('pages.information.form', compact('information'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformationRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            Information::create($request->all());
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
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('pages.information.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('pages.information.form', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(InformationRequest $request, Information $information)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $information->update($request->all());
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diubah']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        DB::beginTransaction();
        try {
            $information->delete();
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
        return datatables()->of(Information::query())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('components.datatables.buttons', [
                    'title' => 'Informasi',
                    'urlOpen' => route('informasi.show', $row->id),
                    'urlEdit' => route('informasi.edit', $row->id),
                    'urlDelete' => route('informasi.destroy', $row->id),
                ]);
            })
            ->toJson();
    }
}
