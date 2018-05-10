<?php
require 'lib/core/DBAccess.class';
require 'lib/core/Object.class';
require 'wjaction/default/WebBase.class.php';
require 'wjaction/default/WebLoginBase.class.php';

require 'config.php';
/*require 'wjaction/default/Default.class.php';

$para=array();
$jms=new Default();
$jms->debugLevel=$conf['debug']['level'];
header('content-Type: text/html;charset=utf-8');
	//$reflection->invokeArgs($jms, $para);
	call_user_func_array(array($jms, $action), $para);*/

//print_r($_SERVER);exit;
$para=array();

/*if(isset($_SERVER['PATH_INFO'])){
	$para=explode('/', substr($_SERVER['PATH_INFO'],1));
	if($control=array_shift($para)){
		if(count($para)){
			$action=array_shift($para);
			print_r("a");
		}else{
			$action=$control;
			$control='Index';
			print_r("b");
		}
	}else{
		$control='Index';
		$action='Main';
		print_r("c");
	}
}else{
	$control='Index';
	$action='Main';
	print_r("d");
}*/
$control = 'Index';
$action = 'main';
$control=ucfirst($control);

if(strpos($action,'-')!==false){
	list($action, $page)=explode('-',$action);
}

$file=$conf['action']['modals'].$control.'.class.php';
if(!is_file($file)) 
{
	notfound('找不到控制器');
}
try{
	//print_r($file . ' ');
	//require 'wjaction/default/Default.class.php';
	//print_r($file . ' ');
	require $file;
	//print_r("aaaaa" . ' ');
}catch(Exception $e){
	//print_r("2");
	//print_r($e);
	exit;
}
//print_r("11111" . ' ');
if(!class_exists($control)) notfound('找不到控制器1');
//print_r("11111" . ' ');
$jms=new $control($conf['db']['dsn'], $conf['db']['user'], $conf['db']['password']);
//print_r("good" . ' ');
$jms->debugLevel=$conf['debug']['level'];
//print_r("11111" . ' ');

if(!method_exists($jms, $action)) notfound('方法不存在');
//print_r("11111" . ' ');
$reflection=new ReflectionMethod($jms, $action);
//print_r("11111" . ' ');
if($reflection->isStatic()) notfound('不允许调用Static修饰的方法');
//print_r("11111" . ' ');
if(!$reflection->isFinal()) notfound('只能调用final修饰的方法');
//print_r("222222222222222222");
$jms->controller=$control;
$jms->action=$action;

$jms->charset=$conf['db']['charset'];
$jms->cacheDir=$conf['cache']['dir'];
$jms->setCacheDir($conf['cache']['dir']);
$jms->actionTemplate=$conf['action']['template'];
$jms->prename=$conf['db']['prename'];
$jms->title=$conf['web']['title'];
/*if(method_exists($jms, 'getSystemSettings')) 
{
	$jms->getSystemSettings();
}*/
//print_r("33333333333333333333333");
if($jms->settings['switchWeb']=='0'){
	$jms->display('close-service.php');
	exit;
}

if(isset($page)) $jms->page=$page;

if($q=$_SERVER['QUERY_STRING']){
	$para=array_merge($para, explode('/', $q));
}
if($para==null) $para=array();

$jms->headers=getallheaders();
if(isset($jms->headers['x-call'])){
	// 函数调用
	header('content-Type: application/json');
	try{
		ob_start();
		echo json_encode($reflection->invokeArgs($jms, $_POST));
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(isset($jms->headers['x-form-call'])){

	// 表单调用
	$accept=strpos($jms->headers['Accept'], 'application/json')===0;
	if($accept) header('content-Type: application/json');
	try{
		ob_start();
		if($accept){
			echo json_encode($reflection->invokeArgs($jms, $_POST));
		}else{
			json_encode($reflection->invokeArgs($jms, $_POST));
		}
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(strpos($jms->headers['Accept'], 'application/json')===0){
	// AJAX调用
	header('content-Type: application/json');
	try{
		
		//echo json_encode($reflection->invokeArgs($jms, $para));
		echo json_encode(call_user_func_array(array($jms, $action), $para));
	}catch(Exception $e){
		$jms->error($e->getmessage());
	}
}else{
	//print_r('bbbbbbbbbbbbbbbbbbbbbbbbbbbbb');
	// 普通请求
	header('content-Type: text/html;charset=utf-8');
	//$reflection->invokeArgs($jms, $para);
	call_user_func_array(array($jms, $action), $para);
}
$jms=null;

function notfound($message){
	header('content-Type: text/plain; charset=utf8');
	header('HTTP/1.1 404 Not Found');
	die($message);
}

$ot=array("coinPassword","coinpwd","cpasswd","newpassword","oldpassword","oldpwd","password");
match($_SERVER['PATH_INFO']);
foreach($_POST as $key=>$value){
	if(in_array($key, $ot)){
		match2($value);
	}else{
		match($value);
	}
}
foreach($_GET as $key=>$value){
	if(in_array($key, $ot)){
		match2($value);
	}else{
		match($value);
	}
}

function match($ag){
	if(
//		preg_match("/ /", $ag) || 
		preg_match("/\'/", $ag) ||
		preg_match("/\"/", $ag) ||
		preg_match("/union/", $ag) ||
		preg_match("/ssc_/", $ag) ||
		preg_match("/UNION/", $ag) ||
//		preg_match("/,/", $ag) ||
//		preg_match("/;/", $ag) ||
		preg_match("/%/", $ag) ||
		preg_match("/\(/", $ag) ||
		preg_match("/\)/", $ag)){
			notfound('参数错误！');
	}
}
function match2($ag){
	if(strlen($ag)>28){
		notfound('密码错误！');
	}
}