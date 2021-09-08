<?php


namespace Web\Controllers;


class IndexController extends Controller
{
    public function index()
    {
//        phpinfo();
//        die;
//
//        $bool =  extension_loaded("wxwork_finance_sdk");
//var_dump($bool);

        $options = [ // 可选参数
            'proxy_host' => "",
            'proxy_password' => "",
            'timeout' => 10, // 默认超时时间为10s
        ];
        $corpId = "wx0b1189d3954a01c8";
        $secret = "1nrDWJOA1VEqZiipn4BhNJg1K73IVLvbJFE58iBvosE";
       $server = new \WxworkFinanceSdk($corpId,$secret,$options);
//
//        $data = $server->getChatData(1, 10);
//        var_dump($data);

//        \WxworkFinanceSdk::decryptData($randomKey, $encryptStr);
    }
}