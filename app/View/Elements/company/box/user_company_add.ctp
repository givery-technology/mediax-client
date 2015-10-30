<div class="box admin_statuses span12">
	<div class="navbar">
		<div class="navbar-inner">
		<h3 class="brand"><?php echo __('Edit Company'); ?></h3>
		</div>
	</div>
	<div class="section company form">
	<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('id'); ?>
		<table class="table tableX">
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Company')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('company', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<!--<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Department')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('department', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Name')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('name', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('TEL')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('tel', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('FAX')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('fax', array('label' => FALSE)); ?>
				</td>
	        </tr>-->
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Email')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('email', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<!--<tr>
				<th>
					<?php echo $this->Html->tag('span', __('URL')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('homepage', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Address')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('address', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Postcode')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('zipcode', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Billlastday')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('billlastday', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Remark')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('remark', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Sell Remark')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('sellremark', array('label' => FALSE)); ?>
				</td>
	        </tr>
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Tech Remark')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('techremark', array('label' => FALSE)); ?>
				</td>
	        </tr>-->
			<tr>
				<th>
					<?php echo $this->Html->tag('span', __('Pwd')); ?>
				</th>
				<td>
					<?php echo $this->Form->input('pwd', array('label' => FALSE, 'type' => 'text')); ?>
				</td>
	        </tr>
		</table>
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>