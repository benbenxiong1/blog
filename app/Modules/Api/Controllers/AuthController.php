<?php


namespace Api\Controllers;


use Api\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $token = Auth::guard($this->guard)->attempt($request->all());
        if(!$token){
            return $this->error('账号或密码错误',401);
        }
        return $this->success(['token'=>'Bearer '.$token,'info'=>auth($this->guard)->user()]);
    }

    public function logout()
    {
        Auth::guard($this->guard)->logout();
        return $this->message('操作成功');
    }
}

