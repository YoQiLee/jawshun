 <?php
	$lastNo=$this->getGameLastNo($this->type);
	$kjHao=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
	if($kjHao) $kjHao=explode(',', $kjHao);
	$actionNo=$this->getGameNo($this->type);
	$types=$this->getTypes();
	$kjdTime=$types[$this->type]['data_ftime'];
	$diffTime=strtotime($actionNo['actionTime'])-$this->time-$kjdTime;
	$kjDiffTime=strtotime($lastNo['actionTime'])-$this->time;
?>
    <div class="bd" id="kaijiang" type="<?=$this->type?>" ctype="<?=$types[$this->type]['type']?>">
      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="game_top_area">
        <tr valign="top">
          <td class="game_top_aleft">
            <ul>
              <li class="ni kj-title"><p class="i2">&nbsp第&nbsp <span class="i1" style="color:#feff65;"><?=$actionNo['actionNo']?></span> 期</p></li>
			  <li class="tm"><span id='current_titles' style="color:#FFF">&nbsp销售截止时间</span><span id="current_endtime"><b style="color:#feff65"><?=date('Y-m-d',strtotime($actionNo['actionTime']))?></b></span></li>
			  <li class="tb"><span class="i2" action="/index.php/display/freshKanJiang/<?=$this->type?>" id="pre-kanjiang"><em class="timebox">0</em><em class="timebox">0</em><em class="separator">:</em><em class="timebox">0</em><em class="timebox">0</em><em class="separator">:</em><em class="timebox">0</em><em class="timebox">0</em></span></li>
    	    </ul>
    	  </td>
       <?php if($types[$this->type]['type']==4) { //快乐十分?>
       <td class="game_top_aright"> 
		  <div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div> 
          <div class="grid_code_ssc wjkjData">
          	  <p class="hide grid_code_tip_position"><img src="/images/common/kjts.png" style="width:333px;" /></p>
              <ul class="kj-hao" ctype="g1" cnum="20">
                <li style="margin-left:4px;" id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
                <li style="margin-left:4px;" id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
                <li style="margin-left:4px;" id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
                <li style="margin-left:4px;" id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
                <li style="margin-left:4px;" id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
                <li style="margin-left:4px;" id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
                <li style="margin-left:4px;" id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
                <li style="margin-left:4px;" id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>

              </ul>
              <div class="clear"></div>
          </div>   
	  </td>
      <td class="game_top_period">
	    <div style='padding:3px 4px'  id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
     <?php }else if($types[$this->type]['type']==6) { //PK10?>
       <td class="game_top_aright">
			<div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div> 
          <div class="grid_code_ssc wjkjData">
          	  <p class="hide grid_code_tip_position"><img src="/images/common/kjts.png"  style="width:333px;"/></p>
              <ul class="kj-hao" ctype="g1" cnum="10">
                <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
                <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
                <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
                <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
                <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
                <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
                <li id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
                <li id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>
                <li id="span_lot_8" class="gr_s gr_s020"> <?=$kjHao[8]?> </li>
                <li id="span_lot_9" class="gr_s gr_s020"> <?=$kjHao[9]?> </li>
              </ul>
              <div class="clear"></div>
          </div>   
	  </td>
      <td class="game_top_period">
	    <div style='padding:3px 4px' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
     <?php }else if($types[$this->type]['type']==9) { //快3?>
      <td class="game_top_aright">
			<div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div> 
            <div class="grid_code_tl wjkjData" >
              <p class="hide grid_code_tip_position"><img src="/images/common/kjtsk3.jpg" style="width:333px;" /></p>
              <ul class="kj-hao k3" ctype="g2"  cnum="6" style="margin-top: 20px;">
                    <li id="span_lot_0" class="gr_ks gr_ks<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_ks gr_ks<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_ks gr_ks<?=intval($kjHao[2])?>"> </li>
                  </ul>
              <div class="clear"></div>
           </div>
       </td> 
       <td class="game_top_period">
	    <div style='padding:3px 4px' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
     <?php }else if($types[$this->type]['type']==3) { //3D?>
      <td class="game_top_aright">
			<div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div> 
            <div class="grid_code_tl wjkjData" >
              	<p class="hide grid_code_tip_position"><img src="/images/common/kjts.png" style="width:333px;" /></p>
              	<ul class="kj-hao" ctype="g0"  cnum="10" style="margin-top: 20px;">
                    <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
                  </ul>
              <div class="clear"></div>
           </div>
       </td> 
       <td class="game_top_period">
	    <div style='padding:3px 4px' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
      <?php }else if($types[$this->type]['type']==2) { //11选5?>
       
         <td class="game_top_aright"> 
				<div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div> 
              <div class="grid_code_ssc wjkjData" >
              	  <p class="hide grid_code_tip_position"><img src="/images/common/kjts.png" style="width:333px;" /></p>
                  <ul class="kj-hao" ctype="g3" cnum="11" style="margin-top: 20px;">
                    <li id="span_lot_0" class="gr_s gr_s<?=$kjHao[0]?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=$kjHao[1]?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=$kjHao[2]?>"> </li>
                    <li id="span_lot_3" class="gr_s gr_s<?=$kjHao[3]?>"> </li>
                    <li id="span_lot_4" class="gr_s gr_s<?=$kjHao[4]?>"> </li>
                  </ul>
                  <div class="clear"></div>
            </div>   
             
	  </td>
	  <td class="game_top_period">
	    <div style='padding:3px 4px' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
      
 	<?php }else{  ?>
       
         <td class="game_top_aright">
				<div class="kj-bottom"><span class="tit"><span class='gamename'><?=$types[$this->type]['title']?></span>&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#feff65"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span><span id="lockgame"></span><div class="clear"></div></div>
              <div class="grid_code_ssc wjkjData" >
				  <p class="hide grid_code_tip_position"><img src="/images/common/kjts.png" style="width:333px;" /></p>
                  <ul class="kj-hao" ctype="g0"  cnum="10" style="margin-top: 20px;">
                    <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
                    <li id="span_lot_3" class="gr_s gr_s<?=intval($kjHao[3])?>"> </li>
                    <li id="span_lot_4" class="gr_s gr_s<?=intval($kjHao[4])?>"> </li>
                  </ul>
                  <div class="clear"></div>
            </div>   
             
	  </td>
	  <td class="game_top_period">
	    <div style='padding:3px 4px' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	  </td>
      
       <?php }?>
        </tr>
      </table>
    </div> 
    <?php if($types[$this->type]['type']==8) {?>
	<div style="padding:3px 4px;border:1px solid #cccccc; margin-top:10px;" id="historylot" class="game_top_period">
        <?php  $this->display('index/inc_data_history.php'); ?>
    </div>
   <?php }?>
<script type="text/javascript">
$(function(){
	window.S=<?=json_encode($diffTime>0)?>;
	window.KS=<?=json_encode($kjDiffTime>0)?>;
	window.kjTime=parseInt(<?=json_encode($kjdTime)?>);
	
	if($.browser.msie){
		//window.diffTime=<?=$diffTime?>;
		setTimeout(function(){
			gameKanJiangDataC(<?=$diffTime?>);
		}, 1000);
	}else{
		setTimeout(gameKanJiangDataC, 1000, <?=$diffTime?>);
	}
	<?php if($kjDiffTime>0){ ?> 
		if($.browser.msie){
		setTimeout(function(){
			setKJWaiting(<?=$kjDiffTime?>);
		}, 1000);
		}else{
			setTimeout(setKJWaiting, 1000, <?=$kjDiffTime?>);
		}
	<?php } ?> 
	
	<?php if(!$kjHao){ ?> 
		loadKjData();
	<?php } ?> 
});
</script>