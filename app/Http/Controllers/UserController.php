<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Flow;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new user();
        $flows = Flow::all();
        return view('pages.user.form', compact('user', 'flows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $request['password'] = bcrypt($request->password);

            $user = User::create($request->all());
            $user->adminProfile()->create($request->all());
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $user = auth()->user();

        return view('pages.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $flows = Flow::all();
        return view('pages.user.form', compact('user', 'flows'));
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

            if ($user->adminProfile) {
                $user->adminProfile->update($data);
            } else {
                $user->adminProfile()->create($request->all());
            }

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
            $user->adminProfile()->delete();
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
        return datatables()->of(User::query()->with('adminProfile')->doesntHave('memberProfile'))
            ->addIndexColumn()
            ->editColumn('civil_servant_identity_number', function ($user) {
                return $user->adminProfile->civil_servant_identity_number;
            })
            ->editColumn('status', function ($user) {
                $status = $user->status;
                if ($status === 'active') {
                    return '<span class="badge badge-success">Aktif</span>';
                } else if ($status === 'inactive') {
                    return '<span class="badge badge-secondary">Tidak Aktif</span>';
                } else {
                    return '<span class="badge badge-danger">Blokir</span>';
                }
            })
            ->addColumn('action', function ($user) {
                return view('components.datatables.buttons', [
                    'title' => 'Admin',
                    'urlEdit' => route('admin.edit', $user->id),
                    'urlDelete' => route('admin.destroy', $user->id),
                ]);
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
    }
}
