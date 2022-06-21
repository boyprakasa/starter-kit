<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

/**
 *
 */
trait PermitLog
{
    public function saveLog($name, $model, $permitLog)
    {
        activity($name)
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->tap(function (Activity $activity) use ($permitLog) {
                $activity->description = $permitLog;
            })
            ->log('');
    }

    public function submitLog(Request $request, Model $model)
    {
        try {
            if ($request->flow == 0) {
                $permitLog = 'primary~icon-user~Mengajukan permohonan';
            } else if ($model->isBeforeRev() && $request->submit_aggrement) {
                $permitLog = 'warning~icon-user~Permohonan sudah direvisi.';
            }
            $this->saveLog('permit', $model, $permitLog);
            return $model;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function approveLog(Request $request, Model $model, $logDesc = null)
    {
        try {
            if (($model->isApprove() || $model->isAfterRev()) && $request->approve_aggrement && !$request->desc_revision) {
                $permitLog = 'success~icon-user-following~' . $logDesc . ' permohonan.';
            } else if (($model->isApprove() || $model->isAfterRev() || $model->isInternalBeforeRev()) && !$request->approve_aggrement && $request->desc_revision) {
                $permitLog = 'danger~icon-user-unfollow~Mengembalikan permohonan, Revisi: ' . $request->desc_revision . '.';
            } else {
                $permitLog = 'warning~icon-people~Permohonan sudah direvisi';
            }
            $this->saveLog('permit', $model, $permitLog);
            return $model;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function eSignLog()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
