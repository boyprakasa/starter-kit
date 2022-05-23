<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.member.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('pages.member.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, user $user)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if (!empty($request->password)) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        DB::beginTransaction();
        try {
            $user->memberProfile()->delete();
            $user->delete();
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
        return datatables()->of(user::query()->with('memberProfile:id,user_id,identity_number,gender,phone')->whereHas('memberProfile'))
            ->addIndexColumn()
            ->addColumn('identity_number', function ($user) {
                return $user->memberProfile->identity_number;
            })
            ->addColumn('phone', function ($user) {
                return $user->memberProfile->phone;
            })
            ->addColumn('status', function ($user) {
                $status = $user->status;
                if ($status === 'active') {
                    return '<span class="badge badge-success">Aktif</span>';
                } elseif ($status === 'inactive') {
                    return '<span class="badge badge-secondary">Tidak Aktif</span>';
                } elseif ($status === 'suspended') {
                    return '<span class="badge badge-danger">Blokir</span>';
                }
            })
            ->addColumn('action', function ($user) {
                return view('components.datatables.buttons', [
                    'title' => 'Pemohon',
                    'urlEdit' => route('member.edit', $user->id),
                    'urlDelete' => route('member.destroy', $user->id),
                ]);
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
    }
}
