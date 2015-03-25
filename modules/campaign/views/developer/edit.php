<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class='alert alert-block alert-error fade in'>
	<a class='close' data-dismiss='alert'>&times;</a>
	<h4 class='alert-heading'>
		<?php echo lang('campaign_errors_message'); ?>
	</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

$id = isset($campaign->id) ? $campaign->id : '';

?>
<div class='admin-box'>
	<h3>campaign</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>
            

			<div class="control-group<?php echo form_error('name') ? ' error' : ''; ?>">
				<?php echo form_label('name'. lang('bf_form_label_required'), 'name', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='name' type='text' required='required' name='name' maxlength='255' value="<?php echo set_value('name', isset($campaign->name) ? $campaign->name : ''); ?>" />
					<span class='help-inline'><?php echo form_error('name'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('start_date') ? ' error' : ''; ?>">
				<?php echo form_label('start_date'. lang('bf_form_label_required'), 'start_date', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='start_date' type='text' required='required' name='start_date'  value="<?php echo set_value('start_date', isset($campaign->start_date) ? $campaign->start_date : ''); ?>" />
					<span class='help-inline'><?php echo form_error('start_date'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('end_date') ? ' error' : ''; ?>">
				<?php echo form_label('end_date'. lang('bf_form_label_required'), 'end_date', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='end_date' type='text' required='required' name='end_date'  value="<?php echo set_value('end_date', isset($campaign->end_date) ? $campaign->end_date : ''); ?>" />
					<span class='help-inline'><?php echo form_error('end_date'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('budget') ? ' error' : ''; ?>">
				<?php echo form_label('budget'. lang('bf_form_label_required'), 'budget', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='budget' type='text' required='required' name='budget' maxlength='11' value="<?php echo set_value('budget', isset($campaign->budget) ? $campaign->budget : ''); ?>" />
					<span class='help-inline'><?php echo form_error('budget'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('budget_daily') ? ' error' : ''; ?>">
				<?php echo form_label('budget_daily'. lang('bf_form_label_required'), 'budget_daily', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='budget_daily' type='text' required='required' name='budget_daily' maxlength='11' value="<?php echo set_value('budget_daily', isset($campaign->budget_daily) ? $campaign->budget_daily : ''); ?>" />
					<span class='help-inline'><?php echo form_error('budget_daily'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('bid') ? ' error' : ''; ?>">
				<?php echo form_label('bid'. lang('bf_form_label_required'), 'bid', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='bid' type='text' required='required' name='bid' maxlength='11' value="<?php echo set_value('bid', isset($campaign->bid) ? $campaign->bid : ''); ?>" />
					<span class='help-inline'><?php echo form_error('bid'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('category_id') ? ' error' : ''; ?>">
				<?php echo form_label('category_id'. lang('bf_form_label_required'), 'category_id', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='category_id' type='text' required='required' name='category_id' maxlength='11' value="<?php echo set_value('category_id', isset($campaign->category_id) ? $campaign->category_id : ''); ?>" />
					<span class='help-inline'><?php echo form_error('category_id'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('state') ? ' error' : ''; ?>">
				<?php echo form_label('state'. lang('bf_form_label_required'), 'state', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='state' type='text' required='required' name='state' maxlength='11' value="<?php echo set_value('state', isset($campaign->state) ? $campaign->state : ''); ?>" />
					<span class='help-inline'><?php echo form_error('state'); ?></span>
				</div>
			</div>

			<div class="control-group<?php echo form_error('device') ? ' error' : ''; ?>">
				<?php echo form_label('device'. lang('bf_form_label_required'), 'device', array('class' => 'control-label')); ?>
				<div class='controls'>
					<input id='device' type='text' required='required' name='device' maxlength='2' value="<?php echo set_value('device', isset($campaign->device) ? $campaign->device : ''); ?>" />
					<span class='help-inline'><?php echo form_error('device'); ?></span>
				</div>
			</div>
        </fieldset>
		<fieldset class='form-actions'>
			<input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('campaign_action_edit'); ?>" />
			<?php echo lang('bf_or'); ?>
			<?php echo anchor(SITE_AREA . '/developer/campaign', lang('campaign_cancel'), 'class="btn btn-warning"'); ?>
			
			<?php if ($this->auth->has_permission('Campaign.Developer.Delete')) : ?>
				<?php echo lang('bf_or'); ?>
				<button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('campaign_delete_confirm'))); ?>');">
					<span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('campaign_delete_record'); ?>
				</button>
			<?php endif; ?>
		</fieldset>
    <?php echo form_close(); ?>
</div>