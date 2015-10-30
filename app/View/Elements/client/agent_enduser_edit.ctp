<div class="row">	
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header" data-original-title="">
				<h2><i class="icon-user"></i><span class="break"></span><?php  echo __('Enduser Edit');?></h2>
			</div>
			<div class="box-content">
				<?php echo $this->Form->create('Enduser'); ?>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo __('Client'); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-briefcase"></i></span>
						  <?php echo $this->Form->input('company', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 株式会社ギブリー</span>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo __('Client Name'); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-user"></i></span>
						  <?php echo $this->Form->input('custom', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 山田太郎</span>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('TEL')); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-phone"></i>
						  </span>
						  <?php echo $this->Form->input('tel', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 999-999-9999</span>
					  </div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Email')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon">@</span>
								<?php echo $this->Form->input('email', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
							</div>
							<span class="help-block col-sm-8">ex. sem@givery.co.jp</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Password')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon"><i class="icon-asterisk"></i></span>
								<?php echo $this->Form->input('pwd', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
							</div>
							<span class="col-sm-8 text-warning"><strong><?php echo __('※変更の時に入力してください') ?></strong></span>
						</div>
					</div>						
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Postcode')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon">〒</span>
								<?php echo $this->Form->input('zipcode', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
							</div>
							<span class="help-block col-sm-8">ex. 123-45678</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Address')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon"><i class="icon-home"></i></span>
								<?php echo $this->Form->input('address', array('label' => FALSE, 'class' => 'form-control', 'type' => 'text')); ?>
							</div>
							<span class="help-block col-sm-8">ex. 東京都渋谷区南平台町15-13帝都渋谷ビル8F</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label"><?php echo __('Assign Keyword'); ?></label>
						<?php 
							echo $this->Form->input('keystr',array('label'=>false,'type'=>'select', 'multiple' => 'checkbox','options'=>$keywords));
						?>
					</div>
				<?php echo $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
				<?php echo $this->Form->end(); ?>
			</div>            
		</div>
	</div>
</div>