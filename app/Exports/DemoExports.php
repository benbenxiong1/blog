<?php


namespace App\Exports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class DemoExports  implements FromCollection
{

    //构造函数传值
    public function __construct($data)
    {
        $this->data = $data;
    }
    //数组转集合
    public function collection()
    {
        return new Collection($this->createData());
    }
    //业务代码
    public function createData()
    {
        return [];

    }
}