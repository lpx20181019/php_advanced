<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/2
 * Time: 14:42
 */

namespace app\index\controller;
use app\common\model\Teacher;

use think\Controller;
use think\Request;

class Login extends Controller
{
    // 用户登录表单
    public function index()
    {
       return $this->fetch();
    }

    // 处理用户提交的登录数据
    public function login()
    {
        // 接收post信息
        $postData = Request::instance()->post();

        // 直接调用M层方法，进行登录。
        if (Teacher::login($postData['username'], $postData['password'])) {
            return $this->success('登录成功', url('Teachers/index'));
        } else {
            return $this->error('用户名或密码不正确', url('index'));
        }
    }

}