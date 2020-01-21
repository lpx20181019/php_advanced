<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/23
 * Time: 16:01
 */

namespace app\index\controller;
use app\index\controller\IndexController;

class User extends IndexController
{
    public function index()
    {
        return "我是User类";
    }

}