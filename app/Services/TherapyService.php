<?php

namespace App\Services;

use App\Models\Therapy;

class TherapyService extends BaseService
{
    protected $clauseProperties = array(
        'id' => 'id',
        'description' => 'description',
        'enabled' => 'enabled'
    );

    public function getTherapies($parameters = FALSE)
    {
        if (!$parameters || empty($parameters)) {
            return Therapy::orderBy('description')->get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Therapy::where($whereClause)->orderBy('description')->get();
    }

    public function deleteTherapy($id)
    {
        return Therapy::destroy($id);
    }

    public function updateTherapy($request, $id)
    {
        $therapy = Therapy::where('id', $id)->firstOrFail();

        $therapy->description = $request->description;
        $therapy->enabled = $request->enabled;

        return $therapy->save();
    }

    public function createTherapy($request)
    {
        $therapy = new Therapy();

        $therapy->description = $request->description;
        $therapy->enabled = $request->enabled;

        return $therapy->save();
    }
}