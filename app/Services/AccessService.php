<?php

namespace App\Services;

use App\Models\Access;

class AccessService extends BaseService
{
    protected $clauseProperties = array(
        'id' => 'id',
        'patient_id' => 'patient_id',
        'physiotherapist_id' => 'physiotherapist_id',
        'enabled' => 'enabled',
        'cycle_id' => 'cycle_id'
    );

    public function getAccesses($parameters = FALSE)
    {
        if (!$parameters || empty($parameters)) {
            return Access::orderBy('created_at', 'desc')->get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Access::where($whereClause)->orderBy('created_at', 'desc')->get();
    }

    public function deleteAccess($id)
    {
        $access = Access::where("id", $id)->first();

        if ($access) {
            return FALSE;
        }

        return Access::destroy($id);
    }

    public function updateAccess($requst, $id)
    {
        $access = Access::where('id', $id)->firstOrFail();

        $access->description = $requst->description;
        $access->enabled = $requst->enabled;

        return $access->save();
    }

    public function createAccess($request)
    {
        $access = new Access();

        $access->description = $request->description;
        $access->enabled = $request->enabled;
        $access->cycle_id = $request->cycle_id;
        $access->note = $request->note;
        $access->physiotherapist_id = $request->physiotherapist_id;
        $access->patient_id = $request->patient_id;

        $result = $access->save();
        //ora creo le terapie

        foreach ($request->therapies as $therapy_id) {
            $access->therapies()->create([
                'access_id' => $access->id,
                'therapy_id' => $therapy_id
            ]);
        }

        return $result;
    }
}