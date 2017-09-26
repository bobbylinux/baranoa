<?php

namespace App\Services;


class BaseService
{
    protected $clauseProperties = array();
    protected $supportedInclude = array();
    protected $rules = array();

    public function validate($object)
    {
        $validator = Validator::make($object, $this->rules);

        $validator->validate();
    }

    protected function getWithKeys($parameters)
    {
        $withKeys = array();

        if (isset($parameters['include']))
        {
            $includeParms = explode(',',$parameters['include']);
            $includes = array_intersect($this->supportedInclude,$includeParms);
            $withKeys = array_keys($includes);
        }

        return $withKeys;
    }

    protected function getWhereClause($parameters)
    {
        $clause = array();

        foreach ($this->clauseProperties as $key => $prop)
        {
            if (in_array($prop, array_keys($parameters)))
            {
                $clause[$key] = $parameters[$prop];
            }
        }

        return $clause;
    }
}