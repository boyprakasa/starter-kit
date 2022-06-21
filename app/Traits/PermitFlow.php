<?php

namespace App\Traits;

trait PermitFlow
{
    public function isApprove()
    {
        return ($this->flowa === 'Internal' && $this->flow_status === 'Setuju');
    }

    public function isBeforeRev()
    {
        return ($this->flowa === 'Pemohon' && $this->flow_status === 'Revisi');
    }

    public function isInternalBeforeRev()
    {
        return ($this->flowa === 'Internal' && $this->flow_status === 'Revisi');
    }

    public function isAfterRev()
    {
        return ($this->flowa === 'Dikembalikan' && $this->flow_status === 'Revisi');
    }

    public function isFinal()
    {
        return ($this->flow === 8 && $this->flowa === 'Internal' && $this->flow_status === 'Setuju');
    }
}
