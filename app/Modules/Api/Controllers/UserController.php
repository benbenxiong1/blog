<?php


namespace Api\Controllers;


use Api\Requests\UserLoginRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function add(UserLoginRequest $request)
    {
        $user = new User();
        $user->guard = $this->guard;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();
        return $this->message('操作成功');
    }

    public function info()
    {
        return $this->success(Auth::guard($this->guard)->user());
    }

}