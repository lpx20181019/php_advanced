<?php
/**
 * 基础模型类
 */
class model{
	protected $db;//保存数据库对象
	public function __construct()//初始化数据库
	{
		$this->initDB();
	}
	private function initDB()
	{
		//实例化数据库操作类
		try{
			$this->db=new PDO("mysql:host=127.0.0.1;port=3306;dbname=mvc_study;charset=utf8",'root','root');
		}catch(\think\exception\PDOException $e){
			die("数据库操作失败：{$e->getMessage()}");
		}

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