<?php

namespace App\View\Components\permohonan;

use Illuminate\View\Component;
use Spatie\Activitylog\Models\Activity;

class RiwayatView extends Component
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
        $service = request()->service->model_type;
        $izin = $service::find(request()->id);
        $histories = $izin->activities;
        return view('components.permohonan.riwayat-view', compact('histories'));
    }
}
