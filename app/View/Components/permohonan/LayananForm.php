<?php

namespace App\View\Components\permohonan;

use App\Models\Service;
use Illuminate\View\Component;

class LayananForm extends Component
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
        $services = Service::all();
        $applicants = auth()->user()->memberProfile->applicant;
        return view('components.permohonan.layanan-form', compact('services', 'applicants'));
    }
}
