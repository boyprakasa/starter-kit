<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    use UploadFile;

    public function upload(Request $request, Service $service)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('files')) {
                $path = 'documents/syarat';
                $this->multipleUpload($request, $service->model_type, $path, 'files');
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Berhasil diupload']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
