<div class="box admin_statuses span12">
	<div class="navbar">
		<div class="navbar-inner">
		<h3 class="brand">
			<?php  echo $user['User']['company'];?>
			<?php echo ($user['User']['agent'] == 0) ? '' : '(' .__('Agent') .')';?>
		</h3>
		</div>
	</div>
	<div class="section">
<!--Flash	-->
	<?php echo $this->Session->flash(); ?>
		<div class="keyword-add">
			<?php echo $this->Html->link(__('Edit Company'), array('controller' => 'users' , 'action' => 'edit', $user['User']['id']), array('class' => "btn btn-success")); ?>
	    </div>
		<div class="keyword-add">
			<?php echo $this->Html->link(__('Add Keyword'), array('controller' => 'keywords' , 'action' => 'add', $user['User']['id']), array('class' => "btn btn-warning")); ?>
	    </div>
		<div class="keyword-add">
			<?php echo ($user['User']['agent'] == 0) ? $this->Html->link(__('Agent Set'), array('controller' => 'users' , 'action' => 'agent_set', $user['User']['id']), array('class' => "btn")) : ''; ?>
	    </div>
		<table class="table tableX">
			<tr><th><?php echo __('Name'); ?></th>
			<td>
				<?php echo h($user['User']['name']); ?>
				&nbsp;
			</td></tr>
			<tr><th><?php echo __('Email'); ?></th>
			<td>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</td></tr>
			<tr><th><?php echo __('Tel'); ?></th>
			<td>
				<?php echo h($user['User']['tel']); ?>
				&nbsp;
			</td></tr>
			<tr><th><?php echo __('Fax'); ?></th>
			<td>
				<?php echo h($user['User']['fax']); ?>
				&nbsp;
			</td></tr>
		</table>
		<a href="../../../sysadmin/login_user_admin.php?userid=<?php echo $user['User']['id']; ?>" class="label label-info" target="_blank"><?php echo __('Go to this client view') ?></a>
	</div>
</div>

<div class="box admin_statuses span12">
	<div class="navbar">
		<div class="navbar-inner">
		<h3 class="brand"><?php  echo __('Keyword');?></h3>
		</div>
	</div>
	<div class="section related">
<!--Set Endate to All Keyword-->
		<div class="keyword-add">
			<?php echo $this->Html->link(__('Set Endate to All Keyword'), '#myModalEnableKeyword', array('data-toggle'=>'modal','role'=>'button','class' => "btn btn-danger")); ?>
	    </div>
		<div class="new-line"></div>
        <?php 
            echo $this->Form->create('Rankhistory',array('class'=>'form-search'));
            $current_year = date('Y'); 
            echo $this->Form->input('rankDate',array('type'=>'date' ,'dateFormat'=>'YMD','monthNames'=>Configure::read('monthNames'), 'maxYear'=>$current_year, 'minYear'=>$current_year-2, 'div'=>FALSE)); 
            echo $this->Form->button(__('Choose'), array('class'=>'btn btn-success'));
            echo $this->Form->end();                         
        ?>
		<?php if (!empty($user['Keyword'])): ?>
        <?php
			$keywords = Hash::extract($user['Keyword'], '{n}[nocontract=0]');
        ?>
		<span class="label label-success"><?php echo __('Contract Keyword'); ?></span>
		<table class="table tableX">
		<tr>
			<th class="tbl1"><?php echo __('ID'); ?></th>
			<th class="tbl4"><?php echo __('Keyword'); ?></th>                        
			<th class="tbl5"><?php echo __('Url'); ?></th>
			<th class="tbl3"><?php echo __('Google/Yahoo'); ?></th>
			<th class="tbl3"><?php echo __('Rankstart'); ?></th>
			<th class="tbl3"><?php echo __('Rankend'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($keywords as $keyword): ?>
			<tr>
				<td><?php echo $keyword['ID']; ?></td>
				<td>
					<?php echo $this->Html->link($keyword['keyword'], array('controller' => 'keywords', 'action' => 'view', $keyword['ID'])); ?>
					<br />
					<span class="kaiyaku"><?php echo ($keyword['rankend'] != 0 && $keyword['rankend'] < date('Ymd')) ? __('Keyword Cancel Date') .$keyword['rankend'] : ''; ?></span>
				</td>
				<td><?php echo $this->Html->link($keyword['Url'],$keyword['Url'], array('target'=>'_blank')); ?></td>
                <td>
<!--Set Load rank Button-->
					<?php 
						echo isset($rankhistory[$keyword['ID']])?$rankhistory[$keyword['ID']] : 
							$this->Html->link(__('Load Today Rank'), 'javascript:void(0)',array('class'=>'loadRank btn btn-danger','KeyID'=>$keyword['ID'])) .$this->Html->image('loading.gif',array('class'=>'loading','style'=>'display:none'))
						; 
					?>
				</td>
				<td><?php echo isset($keyword['Duration'][0]['StartDate']) ? strftime('%Y-%m-%d', strtotime($keyword['Duration'][0]['StartDate'])) : __('No Data'); ?></td>
				<td><?php echo isset($keyword['Duration'][0]['EndDate']) ? strftime('%Y-%m-%d', strtotime($keyword['Duration'][0]['EndDate'])) : __('No Data'); ?></td>
				<td class="actions">
					<div class="btn-group">
						<i class="icon-edit">
                   			<?php echo $this->Html->link(__('Edit'), array('controller' => 'keywords', 'action' => 'edit', $keyword['ID'])); ?>
                    	</i>
					</div>
					<div class="btn-group">
						<i class="icon-plus">
                   			<?php echo $this->Html->link(__('Extra'), array('controller' => 'extras', 'action' => 'add', $keyword['ID'])); ?>
                    	</i>
					</div>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'keywords', 'action' => 'delete', $keyword['ID']), null, __('Are you sure you want to delete # %s?', $keyword['ID'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
                
        <?php	
            $keywords = Hash::extract($user['Keyword'], '{n}[nocontract=1]');
        ?>
		<span class="label label-inverse"><?php echo __('No Contract Keyword'); ?></span>
		<table class="table tableX">
		<tr>
			<th class="tbl1"><?php echo __('ID'); ?></th>
			<th class="tbl3"><?php echo __('Keyword'); ?></th>                        
			<th class="tbl5"><?php echo __('Url'); ?></th>
			<th class="tbl3"><?php echo __('Google/Yahoo'); ?></th>
			<th class="tbl3"><?php echo __('Rankstart'); ?></th>
			<th class="tbl3"><?php echo __('Rankend'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($keywords as $keyword): ?>
			<tr>
				<td><?php echo $keyword['ID']; ?></td>
				<td>
					<?php echo $this->Html->link($keyword['keyword'], array('controller' => 'keywords', 'action' => 'view', $keyword['ID'])); ?>
					<br />
					<span class="kaiyaku"><?php echo ($keyword['rankend'] != 0) ? __('Keyword Cancel Date') .$keyword['rankend'] : ''; ?></span>
				</td>				
                <td><?php echo $this->Html->link($keyword['Url'],$keyword['Url'], array('target'=>'_blank')); ?></td>
                <td>
<!--Set Load rank Button-->
					<?php 
						echo isset($rankhistory[$keyword['ID']])?$rankhistory[$keyword['ID']] : 
							$this->Html->link(__('Load Today Rank'), 'javascript:void(0)',array('class'=>'loadRank btn btn-danger','KeyID'=>$keyword['ID'])) .$this->Html->image('loading.gif',array('class'=>'loading','style'=>'display:none'))
						; 
					?>
				</td>
                <td><?php echo isset($keyword['Duration'][0]['StartDate']) ? strftime('%Y-%m-%d', strtotime($keyword['Duration'][0]['StartDate'])) : __('No Data'); ?></td>
                <td><?php echo isset($keyword['Duration'][0]['EndDate']) ? strftime('%Y-%m-%d', strtotime($keyword['Duration'][0]['EndDate'])) : __('No Data'); ?></td>
				<td class="actions">
					<div class="btn-group">
						<i class="icon-edit">
                   			<?php echo $this->Html->link(__('Edit'), array('controller' => 'keywords', 'action' => 'edit', $keyword['ID'])); ?>
                    	</i>
					</div>
					<div class="btn-group">
						<i class="icon-plus">
                   			<?php echo $this->Html->link(__('Extra'), array('controller' => 'extras', 'action' => 'add', $keyword['ID'])); ?>
                    	</i>
					</div>
					<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'keywords', 'action' => 'delete', $keyword['ID']), null, __('Are you sure you want to delete # %s?', $keyword['ID'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>                
	<?php endif; ?>
	</div>
</div>
<!--Set Endate to All Keyword　Modal-->
<?php echo $this->element('modal/set_all_keyword_enddate', array('user_id' => $user['User']['id'])); ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Keyword'), array('controller' => 'keywords', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.loadRank').click(function(){
        var keyID = $(this).attr('KeyID');
        var loading = $(this).next();
        loading.show();
		$(this).hide();
        $.ajax({
            url:'<?php echo $this->webroot ?>keywords/load_rank_one',
            data:{keyID:keyID},
            type:'POST',
            success:function(data){
                //$('.section .session_flash_message_box').remove();
                //$('.section').prepend('<div class="session_flash_message_box success_box"><div class="message" id="flashMessage">Reset RankEnd success.</div></div>');
                loading.hide();
		window.location.reload(true);
            }
        })
    })
})
</script>