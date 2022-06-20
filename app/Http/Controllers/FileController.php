<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\RequirementsList;
use App\Models\Service;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    use UploadFile;


    public function showForm()
    {
        $requirements = RequirementsList::where('service_id', request()->service->id)->get();
        $requirements->load(['files' => function ($q) {
            $q->where('fileable_id', request()->id);
        }]);
        return view('components.permohonan.persyaratan-form', compact('requirements'));
    }

    public function upload(Request $request, Service $service)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('files')) {
                $path = 'documents/syarat';
                $this->multipleUpload($request, $service->model_type, $path, 'files');
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Berhasil diupload', 'url' => route('upload-syarat', [
                'service' => $service->id,
                'id' => $request->id,
            ])]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function delete(File $file)
    {
        DB::beginTransaction();
        try {
            Storage::delete($file->path);
            $file->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Berhasil dihapus']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
