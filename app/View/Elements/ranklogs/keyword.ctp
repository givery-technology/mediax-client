<?php  foreach ($ranklogs as $ranklog): $rank = json_decode(@$ranklog['Ranklog'][0]['rank'], true); ?>
<?php $params = json_decode(@$ranklog['Ranklog'][0]['params'],true) ?>
<div class="row">	
	<div class="col-lg-12">
		<div class="box">
			<div class="">
				<h2>
					<span class="not-offer label label-info white-link"><?php echo $this->Html->link($ranklog['Keyword']['Keyword'], array('controller' => 'keywords', 'action' => 'ranklog', $ranklog['Keyword']['ID'])); ?></span>
				</h2>
				<span class="align-right">URL:<?php echo $this->Html->link($ranklog['Keyword']['Url'], $ranklog['Keyword']['Url'], array('target'=>'_blank','style'=>(!empty($ranklog['Keyword']['nocontract'])?'color:red':''))); ?></span>
			</div>
			<div class="box-content">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
<!-- ranklog -->
						<tr>
							<th class="" style="width:40%;">本日の順位</th>
							<th class="">
								<?php echo $this->Layout->bestRank($rank); ?>&nbsp;
                                <span class="arrow_row"><?php echo $params['arrow'] ?></span>
							</th>
						</tr>
					</thead>
					<tbody>
<!-- startdate -->
						<tr>
							<td class="">対策開始日</td>
							<td class="">
                                <?php
                                    $flag = false;
                                    foreach ($ranklog['Duration'] as $duration):
                                        if(isset($duration['Flag']) && $duration['Flag'] == 1) {
                                            $flag = true;
                                            echo strftime('%Y年%m月%d日', strtotime($duration['StartDate']));  
                                        } 
                                    endforeach;
                                ?>
                                <?php echo ($flag==false)? '-':''; ?>
                            </td>
						</tr>
<!-- first rank-in -->
						<tr>
							<td class="">初達成日</td>
							<td class="">
                                <?php
                                    $flag = false;
                                    foreach ($ranklog['Duration'] as $duration):
                                        if(isset($duration['Flag']) && $duration['Flag'] == 2) {
                                            $flag = true;
                                            echo strftime('%Y年%m月%d日', strtotime($duration['StartDate']));  
                                        }
                                    endforeach;
                                ?>
                                <?php echo ($flag==false)? '-':''; ?>
                            </td>
						</tr>
<!-- engine -->
						<tr>
							<td class="">成果対象検索エンジン</td>
							<td class="">
                                <?php
                                    $ENGINE = Configure::read('ENGINE');
                                    echo $ENGINE[$ranklog['Keyword']['Engine']]; 
                                ?>
                            </td>
						</tr>
					  </tbody>
				 </table>  
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>