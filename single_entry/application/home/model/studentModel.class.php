<?php
/**
 * student表的操作类，继承基础模型类
 */
class studentModel extends model{
	/* 查询所有学生 */
	public function getAll(){
		$data = $this->fetchAll('select * from `student`');
		return $data;
	}
	/* 查询指定id的学生 */
	public function getByID($id){
		$data = $this->fetchRow("select * from `student` where id={$id}");
		return $data;
	}
}
