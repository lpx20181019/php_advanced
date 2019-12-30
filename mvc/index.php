<?php
/**
 * 前端控制器
 */
header('Content-Type:text/html; charset=utf8');
//载入模型文件
require 'model/model.class.php';
require 'model/studentModel.class.php';
//得到控制器名
$c = isset($_GET['c']) ? $_GET['c'] : 'student';
//载入控制器文件
require 'controller/'.$c.'Controller.class.php';
//实例化控制器（可变变量）
$controller_name = $c.'Controller';
$controller = new $controller_name;
//得到方法名
$action = isset($_GET['a']) ? $_GET['a'] : 'list';
//调用方法（可变方法）
$action_name = $action.'Action';
$controller->$action_name();
