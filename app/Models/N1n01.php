<?php

namespace App\Models;

use App\Traits\PermitFlow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class N1n01 extends Model
{
    use HasFactory, LogsActivity, SoftDeletes, PermitFlow;

    protected static $recordEvents = [];

    protected $guarded = ['id'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
