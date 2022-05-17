<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementsListRequest;
use App\Models\Requirements;
use App\Models\RequirementsList;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.master.requirements_list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requirementsList = new RequirementsList();
        $requirements = Requirements::all();
        $services = Service::all();
        return view('pages.master.requirements_list.form', compact('requirementsList', 'requirements', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementsListRequest $request)
    {

        DB::beginTransaction();
        try {
            $exists = RequirementsList::where([['service_id', $request->service_id], ['requirements_id', $request->requirements_id]])->first();
            if ($exists) {
                return response()->json(['success' => false, 'message' => 'Data already exists']);
            }

            $request->validated();
            $request['need'] = json_encode($request->need);
            RequirementsList::create($request->all());
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
     * @param  \App\Models\RequirementsList  $requirementsList
     * @return \Illuminate\Http\Response
     */
    public function show(RequirementsList $requirementsList)
    {
        return view('pages.master.requirements_list.show', compact('requirementsList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequirementsList  $requirementsList
     * @return \Illuminate\Http\Response
     */
    public function edit(RequirementsList $requirementsList)
    {
        $requirements = Requirements::all();
        $services = Service::all();
        return view('pages.master.requirements_list.form', compact('requirementsList', 'requirements', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequirementsList  $requirementsList
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementsListRequest $request, RequirementsList $requirementsList)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $request['need'] = json_encode($request->need);
            $requirementsList->update($request->all());
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
     * @param  \App\Models\RequirementsList  $requirementsList
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequirementsList $requirementsList)
    {
        DB::beginTransaction();
        try {
            $requirementsList->delete();
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
        return datatables()->of(RequirementsList::query()->with('requirements:id,name,description', 'service:id,category,code,name,model_type'))
            ->addIndexColumn()
            ->editColumn('need', function ($data) {
                return json_decode($data->need);
            })
            ->editColumn('required', function ($data) {
                return $data->required ? '<span class="badge badge-success">Ya</span>' : '<span class="badge badge-danger">Tidak</span>';
            })
            ->editColumn('status', function ($data) {
                return $data->status ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>';
            })
            ->addColumn('action', function ($row) {
                return view('components.datatables.buttons', [
                    'title' => 'Persyaratan',
                    'urlEdit' => route('requirements-list.edit', $row->id),
                    'urlDelete' => route('requirements-list.destroy', $row->id)
                ]);
            })
            ->rawColumns(['action', 'need', 'required', 'status'])
            ->toJson();
    }
}
