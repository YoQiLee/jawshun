<?php
/**
 * 前台页面基类
 */
class Base extends object{


	function __construct($dsn, $user='', $password=''){
		session_start();
		/*if(!$_SESSION[$this->memberSessionName]){
			header('location: /index.php/user/logout');
			exit('您没有登录');
		}

		try{
			parent::__construct($dsn, $user, $password);
			$this->gameFanDian=$this->getValue("select fanDian from {$this->prename}members where uid=?", $GLOBALS['SUPER-ADMIN-UID']);
			
			// 限制同一个用户只能在一个地方登录
			if(!$this->getValue("select isOnLine from ssc_member_session where uid={$this->user['uid']} and session_key=? order by id desc limit 1", session_id())){
				header('location: /index.php/user/logout');
				exit('您已经退出登录，请重新登录');
			}
		}catch(Exception $e){
		}*/
	}
	

}
