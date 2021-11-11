`<?php


namespace App\Filter;


use Illuminate\Http\Request;

class Filter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply()
    {

    }


}