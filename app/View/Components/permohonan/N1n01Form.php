<?php

namespace App\View\Components\permohonan;

use App\Models\District;
use App\Models\Kegiatan;
use App\Models\N1n01;
use App\Models\SkalaBangkitan;
use Illuminate\View\Component;

class N1n01Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $n1n01 = request()->id ? N1n01::firstWhere('id', request()->id) : new N1n01();
        $kegiatans = Kegiatan::get();
        $bangkitans = SkalaBangkitan::get();
        $kecSda = District::where('city_id', 3515)->get();
        return view('components.permohonan.n1n01-form', compact('kegiatans', 'bangkitans', 'kecSda', 'n1n01'));
    }
}
