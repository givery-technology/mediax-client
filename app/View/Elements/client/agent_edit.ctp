<div class="row">
    <?php echo $this->Session->flash(); ?>
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header">
				<h2><i class="icon-edit"></i><?php echo __('Edit Client') ?></h2>
			</div>
			<div class="box-content">
				<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'type'=>'file')); ?>
					<?php echo $this->Form->input('id'); ?>
				  <fieldset class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Logo')); ?></label>
                        <?php if($this->Form->value('User.logo')!=''){ ?>
                        <div class="">
                            <?php echo $this->Html->image('/uploads/logo/'.$this->Form->value('User.logo'),array('class'=>'img-thumbnail')); ?>
                        </div>
                        <?php } ?>
                        <div class="controls row">
                            <div class="input-group col-sm-4">
                                <span class="input-group-addon"><i class="icon-cloud-upload"></i></span>
                                <?php echo $this->Form->input('logo', array('type'=>'file','label' => FALSE, 'class' => 'form-control')); ?>
                            </div>
                            <span class="col-sm-8 text-warning">
                                <strong><?php echo __('※ロゴの最大高さは35pxになります') ?></strong>
                                <div class="newline"></div>
                                <strong><?php echo __('※ロゴの更新は次回のログインから反映されます') ?></strong>
                            </span>
                        </div>
                    </div>				      
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('貴社名')); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-briefcase"></i></span>
						  <?php echo $this->Form->input('company', array('label' => FALSE, 'class' => 'form-control')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 株式会社ギブリー</span>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('部署名')); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-book"></i></span>
						  <?php echo $this->Form->input('department', array('label' => FALSE, 'class' => 'form-control')); ?>
						</div>
						<span class="help-block col-sm-8">ex. SEO事業部</span>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Client Name')); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-user"></i></span>
						  <?php echo $this->Form->input('name', array('label' => FALSE, 'class' => 'form-control')); ?>
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
						  <?php echo $this->Form->input('tel', array('label' => FALSE, 'class' => 'form-control')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 999-999-9999</span>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="date"><?php echo $this->Html->tag('span', __('FAX')); ?></label>
					  <div class="controls row">
						<div class="input-group col-sm-4">
						  <span class="input-group-addon"><i class="icon-file"></i>
						  </span>
						  <?php echo $this->Form->input('fax', array('label' => FALSE, 'class' => 'form-control')); ?>
						</div>
						<span class="help-block col-sm-8">ex. 999-999-9999</span>
					  </div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Postcode')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon">〒</span>
								<?php echo $this->Form->input('zipcode', array('label' => FALSE, 'class' => 'form-control')); ?>
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
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('ホームページ')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon"><i class="icon-globe"></i></span>
								<?php echo $this->Form->input('homepage', array('label' => FALSE, 'class' => 'form-control')); ?>
							</div>
							<span class="help-block col-sm-8">ex. http://www.givery.co.jp</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Email')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon">@</span>
								<?php echo $this->Form->input('email', array('label' => FALSE, 'class' => 'form-control')); ?>
							</div>
							<span class="help-block col-sm-8">ex. sem@givery.co.jp</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="date"><?php echo $this->Html->tag('span', __('Password')); ?></label>
						<div class="controls row">
							<div class="input-group col-sm-4">
								<span class="input-group-addon"><i class="icon-asterisk"></i></span>
								<?php echo $this->Form->input('pwd', array('label' => FALSE, 'class' => 'form-control')); ?>
							</div>
							<span class="col-sm-8 text-warning"><strong><?php echo __('※変更の時に入力してください') ?></strong></span>
						</div>
					</div>
					<div class="form-actions">
					  <?php echo $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
					  <button class="btn btn-default"><?php echo $this->Html->link(__('キャンセル'), array('controller' => 'rankhistories', 'action' => 'client_index'), array('class' => "")); ?></button>
					</div>
				  </fieldset>
				<?php echo $this->Form->end(); ?>

			</div>
		</div>
	</div><!--/col-->
</div><!--/row-->