<?php $this->freshSession(); 
		//更新级别
		$ngrade=$this->getValue("select max(level) from {$this->prename}member_level where minScore <= {$this->user['scoreTotal']}");
		if($ngrade>$this->user['grade']){
			$sql="update ssc_members set grade={$ngrade} where uid=?";
			$this->update($sql, $this->user['uid']);
		}else{$ngrade=$this->user['grade'];}
		
		$date=strtotime('00:00:00');
?>
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