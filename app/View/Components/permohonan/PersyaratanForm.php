<?php

namespace App\View\Components\permohonan;

use App\Http\Controllers\FileController;
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
        $requirements = (new FileController)->requirements(request()->service->id, request()->id);
        return view('components.permohonan.persyaratan-form', compact('requirements'));
    }
}
