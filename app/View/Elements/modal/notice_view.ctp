<div class="modal fade" id="ModalNotice<?php echo $param['id']; ?>" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<span class="status"><?php echo $this->Layout->notice_label($param['label']); ?></span><?php echo $param['title']; ?>
					<span class="date size18"><?php echo $param['created']; ?></span>
				</h4>
			</div>
			<div class="modal-body size18">
				<p>
					<?php echo $param['content']; ?>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">
					確認
				</button>
			</div>
		</div>
	</div>
</div>