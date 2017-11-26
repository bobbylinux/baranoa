<?php

namespace app\Services;

use App\Models\City;

class CityService extends BaseService
{
    protected $supportedInclude = array();

    protected $clauseProperties = array(
        'id' => 'id',
        'name' => 'name',
        'main_code' => 'main_code',
        'fiscal_code' => 'fiscal_code'
    );

    protected $rules = array(
        'name' => 'required|max:255',
        'main_code' => 'required|max:16',
        'fiscal_code' => 'required|string|max:8'
    );

    public function getCities($parameters)
    {
        if (!$parameters || isEmpty($parameters))
        {
            return City::all();
        }

        $whereClause = $this->getWhereClause($parameters);

        return City::where($whereClause)->get();
    }

    public function getSelectableCities()
    {
        $date = date('Y-m-d');
        $citiesList = array(null=>"Selezionare un comune o uno stato estero");

        $cities = City::where('start_date','<=', $date)
            ->where('end_date','>=', $date)
            ->orWhere('end_date', null)
            ->get();

        foreach ($cities as $city) {
            $citiesList[$city->id] = $city->name;
        }

        return $citiesList;
    }

    public function getCitiesDataTable($args)
    {
        $date = date('Y-m-d');

        $args = strtolower("%".trim($args)."%");
        $cities = City::where('start_date','<=', $date)
            ->where('end_date','>=', $date)
            ->orWhere('end_date', null)
            ->whereRaw('lower(name) like ?', $args)
            ->limit(30)
            ->get();

        return $cities;
    }
}