<div class="game-main">
	<div id="bet-game">
		<div class="game-btn">
				<?php
			if ($_COOKIE['mode']) {
				$mode = $_COOKIE['mode'];
			} else {
				$mode = 2.00;
			}

			$this->getTypes();

			$sql = "select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
			$groups = $this->getObject($sql, 'id', $this->types[$this->type]['type']);
			// var_dump($this->types[$this->type]['type']);

			if ($this->groupId && ! $groups[$this->groupId])
				unset($this->groupId);

			if ($groups)
				foreach ($groups as $key => $group) {
					if (! $this->groupId)
						$this->groupId = $group['id'];
						// if($group['enable']){
					?>
					<div class="ul-li<?=($this->groupId==$group['id'])?' current':''?>">
							<a class="cai"
								href="/index.php/index/group/<?=$this->type .'/'.$group['id']?>"><span
								class="content"><?=$group['groupName']?></span></a>
						</div>
				<?php } ?>
				<div class="clear"></div>
		</div>
		<div class="game-cont" style="min-height: 585px;">
			<div style="min-height:585px;">
				<div style="overflow: hidden; height: 100%; background: url(/images/a37.png) bottom center no-repeat #ECEDF1; clear: both;min-height:585px;">
					<?php $this->display('index/inc_game_played.php'); ?>
					<div style="background-color: #ECEDF1;">
						<div class="num-table" style="height: auto;" id="game-dom">
							<div class="fandian">
								<div class="fandian-k">
									<div class="fandian-box">
										<span class="spn8" style="height: 30px;line-height: 30px;font-size: 14px;">奖金/返点：</span>
										<input type="button" id="minbtn" class="min" value="-" step="-0.1" />
										<div id="fandian-value" class="fdmoney"><?=$maxPl?>/0%</div>
										<div id="slider" class="slider"
											value="<?=$this->ifs($_COOKIE['fanDian'], 0)?>"
											data-bet-count="<?=$this->settings['betMaxCount']?>"
											data-bet-zj-amount="<?=$this->settings['betMaxZjAmount']?>"
											max="<?=$this->user['fanDian']?>"
											game-fan-dian="<?=$this->settings['fanDianMax']?>"
											fan-dian="<?=$this->user['fanDian']?>"
											game-fan-dian-bdw="<?=$this->settings['fanDianBdwMax']?>"
											fan-dian-bdw="<?=$this->user['fanDianBdw']?>" min="0"
											step="0.1" slideCallBack="gameSetFanDian" style="display:none;"></div>
										<input type="button" id="maxbtn" class="max" value="+" step="0.1" />
									</div>									
								</div>
								<div class="danwei">
									<div name="danwei" class="danweiitem <?=$this->iff($mode=='2.00','danweiItemCurrent')?>" val="2.00" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian0']?>">元</div>
									<div name="danwei" class="danweiitem <?=$this->iff($mode=='0.20','danweiItemCurrent')?>" val="0.20" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian0']?>">角</div>
									<div name="danwei" class="danweiitem <?=$this->iff($mode=='0.02','danweiItemCurrent')?>" val="0.02" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian0']?>">分</div>
								</div>
								<div class="beishu">
									<input type="button" class="surbeishu" value="-" />
									<input id="beishu" value="<?=$this->ifs($_COOKIE['beishu'],1)?>" class="txt" />
									<input type="button" class="addbeishu" value="+" />
									<span class="spn8" style="height: 30px;line-height: 30px;font-size: 14px;">倍</span>
								</div>
								<div class="touzhu-top">
									<div class="prompt" id="game-tip-dom">
									</div>
								</div>
								<div class="tztj-btn">
									<div class="tztj-hover" onclick="gameActionAddCode()">添加</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
						<div class="touzhu">
							<div class="line"></div>
							<div style="padding: 5px 0; clear: both; height: 145px;">
								<div class="touzhu-cont">
									<table width="100%" style="color: #4b72a9;">

									</table>
								</div>

								<div class="touzhu-bottom">									
									<div class="tz-buytype">	
										<div class="tz-top-btn" onclick="gameActionRemoveCode()">清空</div>
										<label class="zh-true-btn"><input type="checkbox" name="zhuiHao" value="1" /></label>
									</div>
									<div class="tz-tongji">
										注数：<span id="all-count" style="color:#ff0000;">0</span>注<br />
										合计：<span id="all-amount" style="color:#ff0000;">0.00</span>元
									</div>								
									<div class="tz-true-btn">
										<div class="tz-true-hover" id="btnPostBet">投注</div>
									</div>
								</div>
							</div>
							<div class="touzhu-true">
								<table width="100%">
									<thead>
										<tr>
											<td>单号</td>
											<td>投注时间</td>
											<td>彩种</td>
											<td>玩法</td>
											<td>期号</td>
											<td>投注号码</td>
											<td>倍数</td>
											<td>模式</td>
											<td>金额(元)</td>
											<td>奖金(元)</td>
											<td>操作</td>
										</tr>
									</thead>
									<tbody id="order-history"><?php $this->display('index/inc_game_order_history.php'); ?></tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="znz-game" style="display: none;"></div>
				</div>
			</div>
		</div>
	</div>
</div><!-- game-main end -->