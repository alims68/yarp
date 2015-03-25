<style type="text/css">
.btn{
	width:200px;
}
</style>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue-madison">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-bell-o"> </i> <?php echo $this->lang->line('account'); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
							<div class="form-body">
								<h3 class="form-section"></h3>
								<div class="margin-top-10 margin-bottom-10 clearfix">
									<table class="table table-bordered table-striped">
									<tbody><tr>
										<td>
											<?php echo $this->lang->line('full name'); ?>
										</td>
										<td>
											<?php echo $row->name." ".$row->family; ?>
										</td>
										<td>
										</td>
										<td>
											<?php echo $this->lang->line('username'); ?>
										</td>
										<td>
											<?php echo $row->username; ?>
										</td>
									</tr>
									<tr>
										<td>
											<?php echo $this->lang->line('wallet'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id) ?>
										</td>
										<td>
										</td>
										<td>
											<?php echo $this->lang->line('increase_debit'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id,1,1) ?>
										</td>
									</tr>
									<tr>
										<td>
											<?php echo $this->lang->line('creditor'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id,1) ?>
										</td>
										<td>
										</td>
										<td>
											<?php echo $this->lang->line('debtor'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id,2) ?>
										</td>
									</tr>
									<tr>
										<td>
											<?php echo $this->lang->line('month_income'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id,1,'0',1) ?>
										</td>
										<td>
										</td>
										<td>
											<?php echo $this->lang->line('total_income'); ?>
										</td>
										<td>
											<?php echo sum_amount($row->id,1,'0') ?>
										</td>
									</tr>
									</tbody></table>
								</div>
							</div>

								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="amount" class="control-label col-md-2"><?php echo $this->lang->line('price'); ?></label>
											<div class="col-md-9">
												<input id="amount" type="text" class="form-control" name="amount" value="">
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="amount_sign" class="control-label col-md-2"><?php echo $this->lang->line('nature'); ?></label>
											<div class="col-md-9">
												<select id="amount_sign" name="amount_sign" class="form-control select2me">
														<?php 
															if ( $role == 1 ) {
																echo '<option value="1">'.$this->lang->line('creditor').'</option>';
																echo '<option value="3">'.$this->lang->line('creditor_percent').'</option>';
																echo '<option value="2">'.$this->lang->line('debtor').'</option>';
															}else{
																echo '<option value="3">'.$this->lang->line('creditor_percent').'</option>';
															}
														?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="type" class="control-label col-md-2"><?php echo $this->lang->line('type'); ?></label>
											<div class="col-md-9">
												<select id="type" name="type" class="form-control select2me">
														<?php 
															if ( $role == 1 ) {
																echo '<option value="1">'.$this->lang->line('wallet').'</option>';
																echo '<option value="0">'.$this->lang->line('credit').'</option>';
															}else{
																echo '<option value="1">'.$this->lang->line('wallet').'</option>';
															}
														?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="description" class="control-label col-md-2"><?php echo $this->lang->line('description'); ?></label>
											<div class="col-md-9">
												<input id="description" type="text" class="form-control" name="description" value="">
											</div>
										</div>
									</div>
								</div>
							<div class="form-actions">
								<!--/row-->
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-offset-1 col-md-11">
												<button type="submit" class="btn green btn150"><?php echo $this->lang->line('save'); ?></button>
												<a class="btn default btn150" href="<?php echo site_url('accounting'); ?>"><?php echo $this->lang->line('cancel'); ?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<!-- END CONTENT -->