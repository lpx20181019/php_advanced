<?php
/**
 * 学生模块控制器类
 */
class studentController{
	/**
	 * 学生列表
	 */
	public function listAction(){
		//实例化模型，取出数据
		$stu = new studentModel();
		$data = $stu->getAll();
		//载入视图文件
		require 'view/student_list.html';
	}
	/**
	 * 查看指定学生信息
	 */
	public function infoAction(){
		//接收请求参数
		$id = $_GET['id'];
		//实例化模型，取出数据
		$stu = new studentModel();
		$data = $stu->getById($id);
		//载入视图文件
		require 'view/student_info.html';
	}
}
