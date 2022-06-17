<?php

namespace App\View\Components\permohonan;

use App\Models\RequirementsList;
use Illuminate\View\Component;

class PersyaratanForm extends Component
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
        $requirements = request()->id ? RequirementsList::where('service_id', request()->service->id)->get() : null;
        return view('components.permohonan.persyaratan-form', compact('requirements'));
    }
}
