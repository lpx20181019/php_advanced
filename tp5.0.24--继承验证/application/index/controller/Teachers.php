<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2019/12/11
 * Time: 19:12
 */

namespace app\index\controller;
use think\Request;
use app\index\controller\IndexController;
use app\common\model\Teacher;
use think\Controller;
//use think\Db;

class Teachers extends IndexController
{
    public function index()
    {
        $name=Request::instance()->get('name');
        echo $name;
        $Teacher = new Teacher;

        if(!empty($name)){
            $teachers=$Teacher->where('name','like','%'.$name.'%')->select();
        }else{
            $teachers = $Teacher->select();
        }

        // 向V层传数据
        $this->assign('teachers', $teachers);

        // 取回打包后的数据
        $htmls = $this->fetch();

        // 将数据返回给用户
        return $htmls;
    }

    public function add()
    {
        $htmls = $this->fetch();
        return $htmls;
    }


    public function insert()
    {
        // 接收传入数据
        $postData = Request::instance()->post();

        // 实例化Teacher空对象
        $Teacher = new Teacher();

        // 为对象赋值
        $Teacher->name = $postData['name'];
        $Teacher->username = $postData['username'];
        $Teacher->sex = $postData['sex'];
        $Teacher->email = $postData['email'];
//        $Teacher->create_time =time();
        // 新增对象至数据表
        $result=$Teacher->validate(true)->save($Teacher->getData());

        // 反馈结果
        if (false === $result)
        {
            return $this->error('新增失败:' . $Teacher->getError(),'Teachers/add');
        } else {
            return  $this->success('新增成功。新增ID为:' . $Teacher->id,'Teachers/index');
        }
    }

    public function delete()
    {
        // 获取pathinfo传入的ID值.
        $id = Request::instance()->param('id/d'); // “/d”表示将数值转化为“整形”
        if (is_null($id) || 0 === $id) {
            return $this->error('未获取到ID信息');
        }

        // 获取要删除的对象
        $Teacher = Teacher::get($id);

        // 要删除的对象不存在
        if (is_null($Teacher)) {
            return $this->error('不存在id为' . $id . '的教师，删除失败');
        }

        // 删除对象
        if (!$Teacher->delete()) {
            return $this->error('删除失败:' . $Teacher->getError());
        }

        // 进行跳转
        return $this->success('删除成功', url('index'));
    }



    public function edit()
    {
        // 获取传入ID
        $id = Request::instance()->param('id/d');
        // 在Teacher表模型中获取当前记录
        $Teacher = Teacher::get($id);

        // 将数据传给V层
        $this->assign('Teacher', $Teacher);

        // 获取封装好的V层内容
        $htmls = $this->fetch();

        // 将封装好的V层内容返回给用户
        return $htmls;
    }

//    public function update1()
//    {
//       $t1=Request::instance()->post();
//       $teacher=new Teacher();
////       dump($teacher);
////        $stat=$teacher->validate(true)->isUpdate(true)->save($t1);
////        var_dump($stat);
////        return $this->success('ok',url('index'));
//        $message = '更新成功';
//        // 依据状态定制提示信息
//        try {
//            if (false === $teacher->validate(true)->isUpdate()->save($t1)) {
//                $message = '更新失败：' . $teacher->getError();
//            }
//        } catch (\Exception $e) {
//            $message = '更新失败:' . $e->getMessage();
//        }
//        return $message;
//    }

    public function update2()
    {
        // 接收数据，获取要更新的关键字信息
        $id = Request::instance()->post('id/d');
        // 获取当前对象
        $Teacher = Teacher::get($id);
        // 写入要更新的数据
        $Teacher->name = Request::instance()->post('name');
        $Teacher->username = Request::instance()->post('username');
        $Teacher->sex = Request::instance()->post('sex/d');
        $Teacher->email = Request::instance()->post('email');
        // 更新
        $flag=$Teacher->validate(true)->save();

        if($flag){
            return $this->success('更新成功', url('index'));
        }else{
            return $this->error('更新失败', url('edit'));
        }
    }


    public function update()
    {
        try {
            $t1=Request::instance()->post();
            // 获取当前对象
            $teacher=new Teacher();
            if (!is_null($t1)) {
                if (false === $teacher->validate(true)->isUpdate()->save($t1)) {
                    return $this->error('更新失败' . $teacher->getError());
                }
            } else {
                throw new \Exception("所更新的记录不存在", 1);   // 调用PHP内置类时，需要在前面加上 \
            }
            // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;
            // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        // 成功跳转至index触发器
        return $this->success('操作成功', url('index'));
    }


    // 注销
    public function logOut()
    {
        if (Teacher::logOut()) {
            return $this->success('logout success', url('Login/index'));
        } else {
            return $this->error('logout error', url('index'));
        }
    }

}