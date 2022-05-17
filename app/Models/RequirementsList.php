<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementsList extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function requirements()
    {
        return $this->belongsTo(Requirements::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
