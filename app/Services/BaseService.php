<?php

namespace App\Services;


abstract class BaseService
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
            if (in_array($key, array_keys($parameters)))
            {
                if ($parameters[$key] != null) {
                    $clause[$prop] = $parameters[$key];
                }
            }
        }

        return $clause;
    }
}