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
							<i class="fa fa-bell-o"> </i> <?php echo $this->lang->line('escompte_credit'); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
							<div class="form-body">
								<h3 class="form-section"></h3>
									<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="agencya" class="control-label col-md-2"><?php echo $this->lang->line('agency')." A"; ?></label>
											<div class="col-md-9">
												<input id="agencya" type="text" class="form-control" name="agencya" value="<?php echo $row->agencya; ?>">
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="estate" class="control-label col-md-2"><?php echo $this->lang->line('estate'); ?></label>
											<div class="col-md-9">
												<input id="estate" type="text" class="form-control" name="estate" value="<?php echo $row->estate; ?>">
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="agencyb" class="control-label col-md-2"><?php echo $this->lang->line('agency')." B"; ?></label>
											<div class="col-md-9">
												<input id="agencyb" type="text" class="form-control" name="agencyb" value="<?php echo $row->agencyb; ?>">
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="user" class="control-label col-md-2"><?php echo $this->lang->line('user'); ?></label>
											<div class="col-md-9">
												<input id="user" type="text" class="form-control" name="user" value="<?php echo $row->user; ?>">
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