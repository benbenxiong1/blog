<?php


namespace Admin\Controllers;


use Admin\Requests\FormRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //用户注册
    public function register(FormRequest $request)
    {
        Admin::create($request->all());
        return '用户注册成功。。。';
    }
//用户登录
    public function login(Request $request){
        $res = Auth::guard('admin')->attempt(['name'=>$request->name,'password'=>$request->password]);
        if($res){
            return $this->message('登录成功');
        }
        return '用户登录失败';
    }

}