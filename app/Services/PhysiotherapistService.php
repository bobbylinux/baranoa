<?php

namespace App\Services;

use App\Models\Physiotherapist;

class PhysiotherapistService extends BaseService
{

    protected $clauseProperties = array(
        'id' => 'id',
        'lastname' => 'last_name',
        'firstname' => 'first_name',
        'enabled' => 'enabled'
    );

    public function getPhysiotherapists($parameters = FALSE)
    {
        if (!$parameters || empty($parameters))
        {
            return Physiotherapist::orderBy('last_name')->orderBy('first_name')->get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Physiotherapist::where($whereClause)->orderBy('last_name')->orderBy('first_name')->get();
    }

    public function deletePhysiotherapist($id)
    {
        return Physiotherapist::destroy($id);
    }

    public function updatePhysiotherapist($requst, $id)
    {
        $physiotherapist = Physiotherapist::where('id',$id)->firstOrFail();

        $physiotherapist->first_name = $requst->firstname;
        $physiotherapist->last_name = $requst->lastname;
        $physiotherapist->enabled = $requst->enabled;

        return $physiotherapist->save();
    }

}