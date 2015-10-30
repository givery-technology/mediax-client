<?php debug($enduser); ?>
<div class="row">		
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header" data-original-title="">
				<h2><i class="icon-user"></i><span class="break"></span><?php  echo __('Enduser View');?></h2>
			</div>
			<div class="box-content">
				<div class="add-client">
					<?php echo $this->Html->link('', array('action' => 'edit', $enduser['Enduser']['id']), array('class' => 'btn btn-info icon-edit')); ?>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
					<tbody aria-relevant="all" aria-live="polite" role="alert">
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Client'); ?></td>
							<td class=""><?php echo h($enduser['Enduser']['company']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Client Name'); ?></td>
							<td class="center "><?php echo h($enduser['Enduser']['custom']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Tel'); ?></td>
							<td class="center "><?php echo h($enduser['Enduser']['tel']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Email'); ?></td>
							<td class="center "><?php echo h($enduser['Enduser']['email']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Zipcode'); ?></td>
							<td class="center "><?php echo h($enduser['Enduser']['zipcode']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Address'); ?></td>
							<td class="center "><?php echo h($enduser['Enduser']['address']); ?></td>
						</tr>
						<tr class="">
							<td style="width: 265px;" colspan="1" rowspan="1" class=""><?php echo __('Keyword'); ?></td>
							<td class="center"><?php echo h($enduser['Enduser']['keystr']); ?></td>
							
						</tr>
					</tbody>
				</table>
			</div>            
		</div>
	</div>
</div>