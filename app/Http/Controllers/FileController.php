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


    public function requirements($serviceId, $dataId)
    {
        $service = Service::find($serviceId);
        $izin = $service->model_type::find($dataId);
        $applicantType = $izin->applicant->jns_pemohon;

        $requirements = RequirementsList::where([
            ['service_id', $serviceId],
            ['applicant_type', $applicantType]
        ])
            ->with([
                'files' => function ($q) use ($dataId) {
                    $q->where('fileable_id', $dataId);
                }
            ])
            ->withCount([
                'files' => function ($q) use ($dataId) {
                    $q->where([['fileable_id', $dataId], ['required', 1]]);
                }
            ])
            ->get();

        return $requirements;
    }

    public function upload(Request $request, Service $service)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'files.*' => 'mimes:pdf|max:10240'
            ]);

            if ($request->hasFile('files')) {
                $path = 'documents/syarat';
                $this->multipleUpload($request, $service->model_type, $path, 'files');
            }
            DB::commit();
            $requirements = $this->requirements($service->id, $request->fileable_id);
            $showFormAggrement =  $requirements->sum('files_count') ===  $requirements->where('required', 1)->count();
            return response()->json(['success' => true, 'message' => 'Berhasil diupload', 'showFormAggrement' => $showFormAggrement], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    public function delete(Request $request, File $file)
    {
        DB::beginTransaction();
        try {
            Storage::delete($file->path);
            $file->delete();
            DB::commit();
            $requirements = $this->requirements($request->service_id, $request->data_id);
            $showFormAggrement =  $requirements->sum('files_count') ===  $requirements->where('required', 1)->count();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil dihapus',
                'showFormAggrement' => $showFormAggrement
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }
}
