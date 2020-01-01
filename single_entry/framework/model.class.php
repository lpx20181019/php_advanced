<?php
/**
 * 基础模型类
 */
class model {
	protected $db; //保存数据库对象
	public function __construct(){
		$this->initDB(); // 初始化数据库
	}
	private function initDB() {
		$this->db=new PDO("mysql:host=127.0.0.1;post=3306;dbname=mvc_study;charset=utf8",$GLOBALS['config']['db']['user'],$GLOBALS['config']['db']['pass']);
	}
	public function fetchRow($sql)
	{
		return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchAll($sql)
	{
		return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}
