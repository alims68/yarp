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
							<i class="fa fa-bell-o"> </i> <?php echo $this->lang->line('register_price'); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
							<div class="form-body">
								<h3 class="form-section"></h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="agencya_value" class="control-label col-md-2"><?php echo $this->lang->line('agency')." A"; ?></label>
											<div class="col-md-9">
												<input id="agencya_value" type="text" class="form-control" name="agencya_value" value="<?php echo $row->agencya_value; ?>">
												<span class="help-block" id="price"></span>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="estate_value" class="control-label col-md-2"><?php echo $this->lang->line('estate'); ?></label>
											<div class="col-md-9">
												<input id="estate_value" type="text" class="form-control" name="estate_value" value="<?php echo $row->estate_value; ?>">
												<span class="help-block" id="price"></span>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="agencyb_value" class="control-label col-md-2"><?php echo $this->lang->line('agency')." B"; ?></label>
											<div class="col-md-9">
												<input id="agencyb_value" type="text" class="form-control" name="agencyb_value" value="<?php echo $row->agencyb_value; ?>">
												<span class="help-block" id="price"></span>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="user_value" class="control-label col-md-2"><?php echo $this->lang->line('user'); ?></label>
											<div class="col-md-9">
												<input id="user_value" type="text" class="form-control" name="user_value" value="<?php echo $row->user_value; ?>">
												<span class="help-block" id="price"></span>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
							</div>
							<div class="form-actions">
								<!--/row-->
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-offset-1 col-md-11">
												<button type="submit" class="btn green btn150"><?php echo $this->lang->line('update'); ?></button>
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