<?php

namespace App\View\Components\permohonan;

use Illuminate\View\Component;

class AggrementForm extends Component
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
        return view('components.permohonan.aggrement-form', compact('izin'));
    }
}
