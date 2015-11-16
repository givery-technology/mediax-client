<div id="sidebar-left" class="col-lg-2 col-sm-1">
	<div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
		<ul class="nav nav-tabs nav-stacked main-menu">
<!-- top -->
			<li class="<?php echo $this->here==$this->webroot.'rankhistories'?'active':'' ?>">
				<a href="<?php echo $this->webroot?>rankhistories" class="title_link" >
					<i class="icon-calendar"></i><?php echo __('Keyword List'); ?>&nbsp;
				</a>
			</li>

<!-- notice -->
			<li class="<?php echo $this->here==$this->webroot.'users'?'active':'' ?>">
				<a href="<?php echo $this->webroot?>users" class="title_link" >
					<i class="icon-calendar"></i><?php echo __('キーワード詳細'); ?>
					<span class="label label-info" id="">20</span>	
				</a>
			</li>

<!-- keyword -->
			<li class="<?php echo $this->here==$this->webroot.'users'?'active':'' ?>">
				<a href="<?php echo $this->webroot?>users" class="title_link" >
					<i class="icon-calendar"></i><?php echo __('提案キーワード'); ?>
					<span class="label label-important" id="">10</span>
				</a>
			</li>

<!-- agent -->
			<li class="<?php echo $this->here==$this->webroot.'users/agent'?'active':'' ?>">
				<a href="<?php echo $this->webroot?>users/agent" class="title_link" ><i class="icon-calendar"></i><?php echo __('お問い合わせ'); ?></a>
			</li>

<!-- logout -->
			<li>
				<a href="<?php echo $this->webroot?>users/logout" class="title_link <?php echo $this->here==$this->webroot.'users/logout'?'active':'' ?>" ><i class="icon-calendar"></i>ログアウト</a>
			</li>
		</ul>
	</div>
</div>