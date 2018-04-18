<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 

if($this->type){
	$row=$this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
	if(!$row['enable']){
		echo $row['title'].'已经关闭';
		exit;
	}
}else{
	$this->type=1;
	$this->groupId=2;
	$this->played=10;
}
?>
<?php $this->display('inc_skin.php',0,'首页'); ?>
<style>
body{background:url('/skin/main/images/newpng/BG-1080.jpg') center top repeat;}
</style>
<link href="/skin/main/skins.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/main/game.js"></script>
<script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>
<script>window.onerror=function(){return true;}</script></head> 
</head> 
 
<body>
<?php $this->display('index/inc_header.php'); ?>
<div id="mainbody" style="background:none;margin-top:8px;">	
	<div class="gamemain"> 
		<div style="float:left;width:235px;">
			<!-- 用户信息 -->
			<div class="userBox" style="height:174px;">
				<div class="boxFilter" style="height: 174px;"></div>
				<ul style="height: 174px;">
					<li style="height: 174px;">
						<div class="userOperateItem">
							<a href="javascript:void();" id="voice" class="voice voice-on" onclick="voiceKJ()"></a>
							<a href="/index.php/user/logout" class="login-out">
								<img src="/skin/main/images/newpng/ex.png" alt="退出" width="20" height="20" style="border:none"/>
							</a>									
						</div>
						<table style="width: 235px; height: 174px;" cellspacing=0 cellpadding=0 id="userInfo">
							<tr>
								<td style="text-align: center;padding-top:5px;">
								  <img src="/skin/main/images/newpng/userImage.png" alt="" /><br/>
								  <span style="color: #fff;font-size: 12px;"><?=$this->user['username']?></span><br/>
								  <div style="text-align:center;">
									<?
										$coin = round($this->user['coin'],2);
										$coinStrLen = strlen($coin);
										for($i=0;$i<$coinStrLen;$i++)
										{
											$m = substr($coin,$i,1);
									?>
											<span class="numItem"><?=$m?></span>
									<?	} ?>
								  </div>
								</td>
							</tr>
						</table>
					</li>
				</ul>
			</div>
			<!-- 游戏类型 -->
			<div class="gameTypeBox">
				<div class="boxFilter"></div>
				<ul class='ulposistion'>
					<!--<li class="liborderBottom">
						<div class="title">时时彩</div>
					</li>-->
					<li class="item liborderBottom">
						<ul>
							<li>
								<a href="/index.php/index/game/1/6">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">重庆时时彩</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/3/6">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">江西时时彩</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/12/6">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">新疆时时彩</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="item liborderBottom">
						<ul>
							<li>
								<a href="/index.php/index/game/6/10">
								<img src="/skin/main/images/newpng/gd11to5.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">广东11选5</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/16/10">
								<img src="/skin/main/images/newpng/jx11to5.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">江西11选5</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/9/16">
								<img src="/skin/main/images/newpng/fc3d.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">福彩3D</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="item liborderBottom">
						<ul>
							<li>
								<a href="/index.php/index/game/18/19">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">重庆快乐十分</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/10/16">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">排列三</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/20/26">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">北京PK10</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="item liborderBottom">						
						<ul>
							<li>
								<a href="/index.php/index/game/14/72">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">五分彩</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/26/72">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">两分彩</span>
								</a>
							</li>
							<li>
								<a href="/index.php/index/game/5/72">
								<img src="/skin/main/images/newpng/shishicai.png" alt="" /><br/>
								<span style="color: #fff;font-size: 12px;">分分彩</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!--公告-->
			<div class="advertBox">
				<p class="title"><a href="/index.php/notice/info">平台公告</a></p>
				<div>
					<ul>
						<?php
						$cout=0;
						$styles=array('tr_line_2_a','tr_line_2_b');
						if($args[0]) 
						{
							foreach($args[0]['data'] as $var){
							$cout+=1;
							$mod=$cout%2;
						?>
						<li>
							<a href="/index.php/notice/viewpop/<?=$var['id']?>" title="<?=$var['title']?>" target="modal" button="关闭:defaultModalCloase">
								<?=$var['title']?>
							</a>
						</li>
						<?php }}else{ ?>
						<li>没有记录</li>
						<?php } ?>
					</ul>
				</div>						
			</div>
		</div>
		<div style="float:right;width:760px;min-height: 770px;">
			<!-- 开奖信息 -->
			<?php $this->display('index/inc_data_current.php'); ?>
			<!-- 开奖信息 end -->
			<!--游戏body-->
			<div class="game">		
				<?php $this->display('index/inc_game.php'); ?>		
			</div>
			<!--游戏body  end-->
		</div>
		<?php if($this->settings['switchDLBuy']==0){ //代理不能买单?>
		<input name="wjdl" type="hidden" value="<?=$this->ifs($this->user['type'],1)?>" id="wjdl" />
		<?php } ?>    
	</div>
	<?php $this->display('inc_footer.php'); ?>
</div> 
<?php 	// 图片公告
	if(!$_COOKIE['pic-gg'] && $this->settings['picGG']){
		$this->display('index/pic-gg.php');
	}
?>
<script type="text/javascript">
var game={
	type:<?=json_encode($this->type)?>,
	played:<?=json_encode($this->played)?>,
	groupId:<?=json_encode($this->groupId)?>
},
user="<?=$this->user['username']?>",
aflag=<?=json_encode($this->user['admin']==1)?>;
</script>
</body>
</html>