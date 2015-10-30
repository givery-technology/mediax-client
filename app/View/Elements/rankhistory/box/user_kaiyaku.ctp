<div class="box admin_statuses span12">
    <div class="navbar">
        <div class="navbar-inner">
            <h3 class="brand"><?php echo __('Kaiyaku List'); ?></h3>
        </div>
    </div>
    <div class="section">
	<?php App::import('Vendor', 'session_flash_message_box');echo session_flash_message_box::success($this); ?>
	<?php echo $this->Form->create('Rankhistory',array('class'=>'form-search')); ?>
	<div class="input-append">
		<?php echo $this->Form->input('keyword',array('label'=>FALSE,'class'=>'span3 search-query', 'type'=>'text','div'=>FALSE)); ?>
		<?php echo $this->Form->button(__('Search'), array('class'=>'btn')); ?>
	</div>
	<?php echo $this->Form->end(); ?> 
		<div class="show_all"><?php echo $this->Html->link(__('Show all'), array('action' => 'kaiyaku','show_all'), array('class' => "btn btn-info")); ?></div>
		<table class="table tableX">
            <tr>
                <th class="tbl2"><?php echo __('KeyID'); ?></th>
                <th class="tbl5"><?php echo __('Company'); ?></th>
                <th class="tbl6"><?php echo __('Keyword') .'/' .__('Url'); ?></th>
                <!--<th class="tbl2"><?php echo __('Rank'); ?></th>-->
                <!-- <th class="tbl3"><?php echo __('RankDate'); ?></th> -->
                <th class="actions tbl2"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($rankhistories as $rankhistory): ?>
				<tr>
                    <td>
                        <?php echo $rankhistory['Keyword']['ID']; ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($user[$rankhistory['Keyword']['UserID']], array('controller' => 'users', 'action' => 'view', $rankhistory['Keyword']['UserID'])); ?>
                    </td>
                    <td style="<?php echo isset($rankhistory['Keyword']['rankend'])?'color:red':'' ?>">
                    	<?php echo $this->Html->link($rankhistory['Keyword']['Keyword'], array('controller' => 'keywords', 'action' => 'view', $rankhistory['Keyword']['ID']),array('style'=>(isset($rankhistory['Keyword']['rankend'])?'color:red':''))); ?>
						<?php echo isset($rankhistory['Keyword']['rankend'])? '(' .__('Keyword Cancel Date') .' ' .$rankhistory['Keyword']['rankend'] .')' : '';?>
						<?php echo ($rankhistory['Keyword']['Penalty'])? $this->Html->image('yellowcard.gif') : '';?>
                    	<br />
                    	<?php 
							echo $this->Html->link('http://' .$rankhistory['Rankhistory']['Url'],'http://'.$rankhistory['Rankhistory']['Url'], array('target'=>'_blank','style'=>(isset($rankhistory['Keyword']['rankend'])?'color:red':''))); 
						?>
                    </td>
                   <!-- <td>
						<?php 
							global $list_engine;
							echo h($list_engine[$rankhistory['Keyword']['Engine']]); 
						?>&nbsp;
                    	<?php echo h($rankhistory['Rankhistory']['Rank']); ?>&nbsp;
						<?php if(isset($this->request->params['paging'])): ?>
                        	<span class="arrow_row"><?php echo $compareRank['arrow'] ?></span>
                        <?php else: ?>
						<span class="arrow_row" keyID="<?php echo $rankhistory['Keyword']['ID'] ?>" rank="<?php echo $rankhistory['Rankhistory']['Rank'] ?>" rankDate="<?php echo $rankhistory['Rankhistory']['RankDate'] ?>"></span>
                        <?php endif ?>                                                
                    </td>-->
                    <td class="actions">
                        <div class="btn-group">
							<i class="icon-edit">
                       			<?php echo $this->Html->link(__('Edit'), array('controller' => 'keywords', 'action' => 'edit', $rankhistory['Keyword']['ID'])); ?>
                        	</i>
						</div>
						<!--<div class="btn-group">
							<i class="icon-plus">
                       			<?php echo $this->Html->link(__('Extra'), array('controller' => 'extras', 'action' => 'add', $rankhistory['Keyword']['ID'])); ?>
                        	</i>
						</div>-->
						<!--<div class="btn-group">
							<i class="icon-ok">
								<?php echo $this->Html->link(__('Check Enabled'), array('controller' => 'keywords', 'action' => 'enabled', $rankhistory['Keyword']['ID'],($rankhistory['Keyword']['Enabled']==1?0:1))); ?>
							</i>
						</div>-->
                        <!-- <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rankhistory['Rankhistory']['ID']), null, __('Are you sure you want to delete # %s?', $rankhistory['Rankhistory']['ID'])); ?> -->
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
<?php if(!isset($this->request->params['paging'])): ?>
<script type="text/javascript">
    $(document).ready(function() {        
        $('.compareRank').each(function(){
            var obj = $(this);
            var keyID = $(this).attr('keyID');
            var rank = $(this).attr('rank');
            var rankDate = $(this).attr('rankDate');
            $.ajax({
                url: '<?php echo $this->webroot ?>rankhistories/compare_rank',
                data:{keyID:keyID,rank:rank,rankDate:rankDate},
                type:'POST',
                async: true,
                dataType:'json',
                success: function(data) {
                    if(data.color !='undefined' && data.color !=''){                                                       
	                    obj.css('background',data.color);
                    }else if(data.color !='undefined' && data.arrow!=''){
                            obj.parents('tr').find('td').find('.arrow_row').html(data.arrow);
                    }
                }
            })                        
        })        
    })
</script>
<?php endif ?>