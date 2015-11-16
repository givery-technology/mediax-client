<!-- notice -->
<?php echo $this->Element('notice/index'); ?>

<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h2><?php echo __('Keyword List'); ?></h2>
			</div>
			<div class="box-content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('Search',array('class'=>'form-search')); ?>
				<div class="input-append">
					<?php echo $this->Form->input('query',array('label'=>FALSE,'class'=>'span3 search-query', 'type'=>'text','div'=>FALSE)); ?>
					<?php echo $this->Form->button(__('Search'), array('class'=>'btn')); ?>
				</div>
				<?php echo $this->Form->end(); ?>
				<br />
				<table class="table">
					<tr>
						<th class="tbl6"><?php echo __('Keyword'); ?></th>
						<th class="tbl5"><?php echo __('Url'); ?></th>
						<th class="tbl2"><?php echo __('Rank'); ?></th>
						<th class="actions tbl2"><?php echo __('状況'); ?></th>
					</tr>
					<?php  foreach ($ranklogs as $ranklog): $rank = json_decode($ranklog['Ranklog']['rank'], true); ?>
						<?php $params = json_decode($ranklog['Ranklog']['params'],true) ?>
						<tr style="background:<?php echo $params['color'] ?>">
<!-- keyword -->
							<td style="<?php echo !empty($ranklog['Keyword']['nocontract'])?'color:red':'' ?>">
								<?php echo $this->Html->link($ranklog['Keyword']['Keyword'], array('controller' => 'keywords', 'action' => 'ranklogs', $ranklog['Keyword']['ID']),array('style'=>(!empty($ranklog['Keyword']['nocontract'])?'color:red':''))); ?>
								<span class="kaiyaku"><?php echo (isset($ranklog['Keyword']['rankend']) && $ranklog['Keyword']['rankend'] != 0)? '(' .__('Keyword Cancel Estimate') .' ' .$ranklog['Keyword']['rankend'] .')' : '';?></span>
								<?php echo ($ranklog['Keyword']['Penalty'])? $this->Html->image('yellowcard.gif') : '';?>
							</td>
<!-- url -->
							<td>
								<?php 
									echo $this->Html->link($ranklog['Keyword']['Url'], $ranklog['Keyword']['Url'], array('target'=>'_blank','style'=>(!empty($ranklog['Keyword']['nocontract'])?'color:red':''))); 
								?>
							</td>
<!-- ranklogs -->
							<td>
                                <?php echo $this->Layout->bestRank($rank); ?>&nbsp;
                                <span class="arrow_row"><?php echo $params['arrow'] ?></span>
                            </td>
<!-- actioms -->
							<td class="actions">
								<?php echo $this->Html->link(__('SEO対策中'), array('controller' => 'keywords', 'action' => 'ranklogs', $ranklog['Keyword']['ID']), array('class' => 'btn btn-success')); ?>
							</td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php if(isset($this->request->params['paging'])): ?>
				<p>
					<?php
						echo $this->Paginator->counter(array(
							'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
						));
					?>	</p>
				<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>	