<div class="box admin_statuses span12">
	<div class="navbar">
		<div class="navbar-inner">
		<h3 class="brand"><?php  echo __('Company');?></h3>
		</div>
	</div>
	<div class="section">
		<!--<div class="show_all"><?php echo $this->Html->link(__('Show all'), array('action' => 'index','show_all'), array('class' => "btn btn-info")); ?></div>-->
		<div class="common-button"><?php echo $this->Html->link(__('Add Company'), array('action' => 'add'), array('class' => "btn btn-warning")); ?></div>
		<table class="table tableX">
			<tr>
					<th><?php echo __('Id'); ?></th>
					<th class="tbl6"><?php echo __('Company'); ?></th>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('Email'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($user['User']['company'], array('action' => 'view', $user['User']['id'])); ?></td>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td class="actions">
					<div class="keyword-add">
						<?php echo $this->Html->link(__('Add Keyword'), array('controller' => 'keywords' , 'action' => 'add', $user['User']['id']), array('class' => "btn btn-success")); ?>
				    </div>
					<div class="btn-group">
						<i class="icon-remove">
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
						</i>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		
		<!--<p>
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
		</div>-->
	</div>
</div>

