<?php


namespace Api\Requests;


class UserLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:16'],
            'password' => ['required', 'string', 'min:6', 'max:16'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "用户名不能为空",
            "name.min" => "用户名最小长度为3",
            "name.max" => "用户名最大长度为16",
            "password.required" => "密码不能为空",
            "password.min" => "密码最小长度为6",
            "password.max" => "密码最大长度为16",
        ];
    }
}