<?php

namespace App\Traits;

use App\Models\File as ModelsFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

trait UploadFile
{
    public function uploadFile(Request $request, Model $model, $path, $inputName)
    {
        try {
            if (!File::exists(storage_path($path))) {
                File::makeDirectory(storage_path($path), 0777, true, true);
            }

            $fileName = Uuid::uuid4();

            if ($request->$inputName->getClientMimeType() == 'application/pdf') {
                $newFileName = $fileName . '.pdf';
            }

            if ($model) {
                Storage::delete($model->path);
                $model->update(['path' => $path . '/' . $newFileName]);
            } else {
                $model->create(['path' => $path . '/' . $newFileName]);
            }

            $request->file($inputName)->storeAs($path, $newFileName);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function multipleUpload(Request $request, $model, $path, $inputName)
    {
        try {
            foreach ($request->file($inputName) as $key => $file) {
                if ($file->getClientMimeType() === 'application/pdf') {
                    $fileName = Uuid::uuid4() . '.' . $file->getClientOriginalExtension();
                }

                $file->storeAs($path, $fileName);
                ModelsFile::create([
                    'fileable_type' => $model,
                    'fileable_id' => $request->fileable_id,
                    'fileable_checklist_id' => $request->checklist_id[$key],
                    'path' => $path . '/' . $fileName,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
