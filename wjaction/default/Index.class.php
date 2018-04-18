<?php
class Index extends WebLoginBase{
	//平台首页
	public final function main(){
		/*$sql="select * from {$this->prename}content where enable=1 and nodeId=1";
		$sql.=' order by id desc LIMIT 5';		
		$info=$this->getPage($sql, $this->page, $this->pageSize);*/
		
		$this->action='index';
		$this->display('index.php');
	}
}