<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/23
 * Time: 15:55
 */

namespace app\index\controller;
use think\Controller;
use app\index\model\User;
class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!User::islogin()) {
            return $this->error("login first", url('index/index'));
        }
    }
}