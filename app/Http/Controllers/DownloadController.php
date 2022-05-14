<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadRequest;
use App\Models\Download;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.download.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $download = new Download();
        return view('pages.download.form', compact('download'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DownloadRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $download = Download::create($request->all());
            $this->uploadFile($request, $download, 'downloads', 'file');
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
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        return view('pages.download.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        return view('pages.download.form', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(DownloadRequest $request, Download $download)
    {
        DB::beginTransaction();
        try {
            $request->validated();
            $download->update($request->all());

            if ($request->hasFile('file')) {
                $this->uploadFile($request, $download, 'downloads', 'file');
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
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        DB::beginTransaction();
        try {
            Storage::delete($download->path);
            $download->delete();
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
        return datatables()->of(Download::query())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('components.datatables.buttons', [
                    'title' => 'Download',
                    // 'urlOpen' => route('download.show', $row->id),
                    'urlDownload' => Storage::url($row->path),
                    'urlEdit' => route('download.edit', $row->id),
                    'urlDelete' => route('download.destroy', $row->id),
                ]);
            })
            ->toJson();
    }
}
