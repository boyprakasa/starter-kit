<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatureRequest;
use App\Models\Signature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.master.signature.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $signature = new Signature();
        $users = User::all();
        return view('pages.master.signature.form', compact('signature', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignatureRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            Signature::create($request->all());
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
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
        return view('pages.master.signature.show', compact('signature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function edit(Signature $signature)
    {
        $users = User::all();
        return view('pages.master.signature.form', compact('signature', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(SignatureRequest $request, Signature $signature)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $signature->update($request->all());
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
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
        DB::beginTransaction();
        try {
            $signature->delete();
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
        return datatables()->of(Signature::query()->with('user'))
            ->addIndexColumn()
            ->addColumn('name', function ($signature) {
                return $signature->user->name;
            })
            ->addColumn('valid_date', function ($signature) {
                return fullDate($signature->start_date) . ' s/d ' . fullDate($signature->end_date);
            })
            ->editColumn('status', function ($signature) {
                return $signature->status ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>';
            })
            ->addColumn('action', function ($signature) {
                return view('components.datatables.buttons', [
                    'title' => 'Tanda Tangan',
                    'urlEdit' => route('signature.edit', $signature->id),
                    'urlDelete' => route('signature.destroy', $signature->id),
                ]);
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
    }
}
