<?php


namespace App\Models;

use \Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * @var array  要过滤的条件
     *  [
     *      "filed", //要过滤的字段
     *      "filed" => "operator"  //过滤的字段 => 过滤的条件
     *      "filed" => [ "operator", "?"]  //过滤的字段 => [ 过滤的条件, 待替换的条件]
     *  ]
     */
    protected $simpleFilters = [];

    protected function getSimpleFilters()
    {
        $filter = [];
        foreach ($this->simpleFilters as $k => $v){
            if(is_int($k)){
                $filter[$v] = "=";
            }else {
                $filter[$k] = $v;
            }
        }
        return $filter;
    }

    /**
     * @param $query
     * @param $request array 要过滤的数据条件
     * @return mixed
     */
    public function scopeFilter($query,$request)
    {
        $filer = $this->getSimpleFilters();
        if(!empty($filer)){
            foreach ($request as $k => $v){
                if(isset($filer[$k])){
                    $operator = is_array($filer[$k])?$filer[$k][0]:$filer[$k];
                    $value = is_array($filer[$k])?str_replace('?',$v,$filer[$k][1]):$v;
                    $query->where($k,$operator,$value);
                }
            }
        }
        return $query;
    }

}