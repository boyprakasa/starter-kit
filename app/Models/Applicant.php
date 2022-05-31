<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function memberProfile()
    {
        return $this->belongsTo(MemberProfile::class, 'member_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function village()
    {
        return $this->hasOne(Village::class, 'id', 'village_id');
    }

    public function fullAddress()
    {
        $alamat = $this->alamat ?? '-';
        $kelurahan = $this->village->name ?? '-';
        $kecamatan = $this->district->name ?? '-';
        $kota = $this->city->name ?? '-';
        $provinsi = $this->province->name ?? '-';

        return "{$alamat}, {$kelurahan}, {$kecamatan}, {$kota}, {$provinsi}";
    }
}
