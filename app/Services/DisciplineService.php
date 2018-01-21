<?php

namespace App\Services;

use App\Models\Discipline;
use App\Models\Doctor;

class DisciplineService extends BaseService
{
    protected $clauseProperties = array(
        'id' => 'id',
        'description' => 'description',
        'enabled' => 'enabled'
    );

    public function getDisciplines($parameters = FALSE)
    {
        if (!$parameters || empty($parameters))
        {
            return Discipline::orderBy('description')->get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Discipline::where($whereClause)->orderBy('description')->get();
    }

    public function getSelectableDisciplines()
    {
        $disciplinesList = array(null=>"Selezionare una disciplina");

        $disciplines = Discipline::where('enabled', TRUE)->get();

        foreach ($disciplines as $discipline) {
            $disciplinesList[$discipline->id] = $discipline->description;
        }

        return $disciplinesList;
    }

    public function deleteDiscipline($id)
    {
        $doctors = Doctor::where("discipline_id", $id)->first();

        if ($doctors) {
            return FALSE;
        }

        return Discipline::destroy($id);
    }

    public function updateDiscipline($requst, $id)
    {
        $discipline = Discipline::where('id',$id)->firstOrFail();

        $discipline->description = $requst->description;
        $discipline->enabled = $requst->enabled;

        return $discipline->save();
    }

    public function createDiscipline($request)
    {
        $discipline = new Discipline();

        $discipline->description = $request->description;
        $discipline->enabled = $request->enabled;

        return $discipline->save();
    }

}