<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header" data-original-title="">
				<h2><i class="icon-user"></i><span class="break"></span><?php  echo __('Client List');?></h2>
			</div>
			<div class="box-content">
				<div class="add-client">
				    <?php echo $this->Html->link(__('Add Client'), array('action' => 'add'), array('class' => "btn btn-warning")); ?>
				    <a href="<?php echo FULL_BASE_URL .ENDUSER_PATH ?>/users/logout" class="btn btn-success" target="_blank"><?php echo __('Enduser Login') ?></a>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
					<thead>
						<tr role="row">
						  	<th style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Client'); ?></th>
							<th style="width: 211px;" colspan="1" rowspan="1" class=""><?php echo __('Client Name'); ?></th>
							<th style="width: 124px;" colspan="1" rowspan="1" class=""><?php echo __('Email'); ?></th>
							<th style="width: 220px;" colspan="1" rowspan="1" class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>   
					<?php foreach ($endusers as $enduser): ?>
					<tbody aria-relevant="all" aria-live="polite" role="alert">
						<tr class="">
							<td class=""><?php echo h($enduser['Enduser']['company']); ?></td>
							<td class=""><?php echo h($enduser['Enduser']['custom']); ?></td>
							<td class=""><?php echo h($enduser['Enduser']['email']); ?></td>
							<td class="">
							    <?php if($enduser['Enduser']['email'] != '') { ?>
                                    <a href="<?php echo FULL_BASE_URL .ENDUSER_PATH ?>/users/autologin/<?php echo 'email:'.base64_encode($enduser['Enduser']['email']) .'/pass:' .$enduser['Enduser']['pwd']; ?>" class="btn btn-success icon-eye-open" target="_blank"></a>
							    <?php } ?>
								<?php echo $this->Html->link('', array('action' => 'edit', $enduser['Enduser']['id']), array('class' => 'btn btn-info icon-edit')); ?>
								<?php echo $this->Form->postLink('', array('action' => 'delete', $enduser['Enduser']['id']), array('class' => 'btn btn-danger icon-trash'), __('クライアント【%s】を削除しますか？', $enduser['Enduser']['company'])); ?>
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
			</div>            
		</div>
	</div>
</div>
