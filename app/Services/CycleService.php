<?php
namespace App\Services;

use App\Models\Cycle;

class CycleService extends BaseService
{

    public function getPatientOpenedCycles($patient_id) {
        return Cycle::where('patient_id',$patient_id)->where('end_date', null)->first();
    }

    public function createCycle($patient_id)
    {
        $cycle = new Cycle();

        $cycle->patient_id = $patient_id;

    }
}
