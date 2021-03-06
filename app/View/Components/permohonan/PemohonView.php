<?php

namespace App\View\Components\permohonan;

use App\Http\Controllers\ApplicantController;
use App\Models\Applicant;
use Illuminate\View\Component;

class PemohonView extends Component
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
        $applicant = Applicant::findOrFail(request()->applicant->id);
        return view('components.permohonan.pemohon-view', compact('applicant'));
    }
}
