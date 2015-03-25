
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-madison">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bell-o"> </i> <?php if(isset($title)) echo "$title"; ?>
				</div>
			</div>
			<div class="portlet-body form">
				<div class='admin-box'>
					<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
						<div class="form-body">
							
							<div class="form-group <?php echo form_error('name') ? ' error' : ''; ?>">
								<?php echo form_label('name'. lang('bf_form_label_required'), 'name', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-inline input-medium">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											<input class="form-control" id='name' type='text'  name='name' value="<?php echo set_value('name', isset($campaign->name) ? $campaign->name : ''); ?>" />
										</div>
									</div>
									<span class='help-inline'><?php echo form_error('name'); ?></span>
								</div>
							</div>
							
							<div class="form-group <?php echo form_error('budget') ? ' error' : ''; ?>">
								<?php echo form_label('budget'. lang('bf_form_label_required'), 'budget', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-inline input-medium">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											<input id='budget' type='text' required='required' name='budget' maxlength='255' value="<?php echo set_value('budget', isset($campaign->budget) ? $campaign->budget : '300'); ?>" />
										</div>
									</div>
									<span class='help-inline'><?php echo form_error('budget'); ?></span>
								</div>
							</div>

							<div class="form-group <?php echo form_error('budget_daily') ? ' error' : ''; ?>">
								<?php echo form_label('budget_daily'. lang('bf_form_label_required'), 'budget_daily', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-inline input-medium">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											<input id='budget_daily' type='text' required='required' name='budget_daily' maxlength='255' value="<?php echo set_value('budget_daily', isset($campaign->budget_daily) ? $campaign->budget_daily : '10'); ?>" />
										</div>
									</div>
									<span class='help-inline'><?php echo form_error('budget_daily'); ?></span>
								</div>
							</div>

							<div class="form-group <?php echo form_error('bid') ? ' error' : ''; ?>">
								<?php echo form_label('bid'. lang('bf_form_label_required'), 'bid', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-inline input-medium">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											<input class="form-control" id='bid' type='text' required='required' name='bid' maxlength='255' value="<?php echo set_value('bid', isset($campaign->bid) ? $campaign->bid : '10'); ?>" />
										</div>
									</div>
									<span class='help-inline'><?php echo form_error('bid'); ?></span>
								</div>
							</div>

							<div class="form-group <?php echo form_error('category_id') ? ' error' : ''; ?>">
								<?php echo form_label('category_id'. lang('bf_form_label_required'), 'category_id', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-inline input-medium">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
											<input class="form-control" id='category_id' type='text' required='required' name='category_id' maxlength='255' value="<?php echo set_value('category_id', isset($campaign->category_id) ? $campaign->category_id : '10'); ?>" />
										</div>
									</div>
									<span class='help-inline'><?php echo form_error('category_id'); ?></span>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('state'. lang('bf_form_label_required'), 'state', array('class' => 'control-label col-md-2')); ?>
								<div class="col-md-4">
									<?php ostan(unserialize($campaign->state)); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('device'. lang('bf_form_label_required'), 'device', array('class' => 'col-md-2 control-label')); ?>
								<div class="col-md-10">
									<div class="input-group">
										<div class="icheck-list">
											<label>
											<input value="all" type="radio" name="device" class="icheck"> همه </label>
											<label>
											<input value="mobile" type="radio" name="device" checked="checked" class="icheck"> موبایل </label>
											<label>
											<input value="desktop" type="radio" name="device" class="icheck"> کامپیوتر شخصی </label>
										</div>
									</div>
									
									<span class="help-inline"><?php echo form_error('device'); ?></span>
								</div>
							</div>
						</div>
						<fieldset class='form-actions'>
							<input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('campaign_action_edit'); ?>" />
							<?php echo lang('bf_or'); ?>
							<?php echo anchor(SITE_AREA . '/content/campaign', lang('campaign_cancel'), 'class="btn btn-warning"'); ?>
							
							<?php if ($this->auth->has_permission('Campaign.Content.Delete')) : ?>
								<?php echo lang('bf_or'); ?>
								<button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('campaign_delete_confirm'))); ?>');">
									<span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('campaign_delete_record'); ?>
								</button>
							<?php endif; ?>
						</fieldset>
					<?php echo form_close(); ?>
				</div>
			
			</div>
		</div>
	</div>
</div>

</div>
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<!-- END QUICK SIDEBAR -->
</div>