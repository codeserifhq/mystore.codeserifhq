<?php

namespace App\Repositories;

class BaseRepository {
    protected $model;


    public function getModelRecords($args) {
        if (count($args)>0) {
            
            if (isset($args['json_query'])) {
                $arrayQuery = json_decode($args['json_query']);

                if (!$arrayQuery) {
                    return null;
                }

                $this->model = $this->getQuery($this->model, $arrayQuery);
            } 
            
            if (isset($args['page']) && isset($args['limit'])) {
                
                $this->modelQueryWithPageAndLimit($args);
                
            }

        }

        $this->additionalConditions();

        return $this->model->get();        
    }

    public function getAggregateBasedOnSearch($args) {
        
        if (isset($args['json_query'])) {
            $arrayQuery = json_decode($args['json_query']);

            if (!$arrayQuery) {
                return null;
            }

            $this->model = $this->getQuery($this->model, $arrayQuery);
        
        }
        
        $this->additionalConditions();

        return $this->model->count();
        
    }
    
    public function getModel() {
        return $this->model;
    }

    protected function additionalConditions() {
        //hook required conditions here per model
    }

    protected function getActualOffset($page, $limit) {
        return ($page = $page - 1) * $limit;
    }

    protected function getQuery($model, $array, $operator = "and") {

        if (count($array) > 0)  {

            if (gettype($array[0]) == 'object') {

                $value =  $array[0];
            
                $model = $model->{$this->getWhereFunction($operator)}($value->column, $value->operator, $value->value);

                array_shift($array);

                if (isset($value->boolean_operator)) {
                    return $this->getQuery($model, $array, $value->boolean_operator);
                } else {
                    return $this->getQuery($model, $array);
                }

            } else {
                
                if (count($array[0]) == 0) {
                    
                    array_shift($array);

                    return $this->getQuery($model, $array, $operator);
                }

                $data = $array[0][0];
                
                $tempArray = $array[0];

                $model = $model->{$this->getWhereFunction($operator)}(function ($query) use ($tempArray, $operator) {
                    $query = $this->getQuery($query, $tempArray, $operator);
                });

                array_shift($array);

                if (isset($data->boolean_operator)) {
                    return $this->getQuery($model, $array, $data->boolean_operator);
                } else {
                    return $this->getQuery($model, $array);
                }
                
            }
        }else{
            return $model;
        }
    }

    protected function getWhereFunction($operator) {
        if ($operator == 'and') {
            return "where";
        }else {
            return "orWhere";
        }
    }

    protected function modelQueryWithPageAndLimit($args) {
        $this->model = $this->model
            ->offset($this->getActualOffset($args['page'], $args['limit']))
            ->limit($args['limit']);
    }

}