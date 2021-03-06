<?php

namespace App\Http\Controllers;

use App\Http\Requests\n1n01Request;
use App\Models\N1n01;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class N1n01Controller extends Controller
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
    public function store(n1n01Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $n1n01 = N1n01::create($request->all());
            DB::commit();
            return response()->json([
                'type' => 'new',
                'url' => route('permohonan.third-view', [
                    'id' => $n1n01->id,
                    'service' => $n1n01->service_id,
                    'applicant' => $n1n01->applicant_id,
                ]),
                'success' => true,
                'message' => 'Data berhasil disimpan.'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Data gagal disimpan.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\N1n01  $n1n01
     * @return \Illuminate\Http\Response
     */
    public function show(N1n01 $n1n01)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\N1n01  $n1n01
     * @return \Illuminate\Http\Response
     */
    public function edit(N1n01 $n1n01)
    {
        $n1n01->with('service', 'applicant')->get();
        return [
            'n1n01' => $n1n01,
        ];
        // return view('n1n01.edit', compact('n1n01'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\N1n01  $n1n01
     * @return \Illuminate\Http\Response
     */
    public function update(N1n01Request $request, N1n01 $n1n01)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $n1n01->update($request->all());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah.'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Data gagal disimpan.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\n1n01  $n1n01
     * @return \Illuminate\Http\Response
     */
    public function destroy(N1n01 $n1n01)
    {
        DB::beginTransaction();
        try {
            if ($n1n01->flow < 8) {
                // Permanent
                $files = $n1n01->files;
                foreach ($files as $file) {
                    Storage::delete($file->path);
                    $file->delete();
                }
                $n1n01->forceDelete();
            } else {
                // Temporary
                $n1n01->delete();
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus.'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus.'
            ], 500);
        }
    }
}
