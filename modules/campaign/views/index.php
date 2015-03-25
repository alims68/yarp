<?php

$num_columns	= 5;
$can_delete		= $this->auth->has_permission('Campaign.Content.Delete');
$can_edit		= $this->auth->has_permission('Campaign.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-madison">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bell-o"> </i> <?php echo lang('campaign_area_title'); ?>
				</div>
			</div>
			<div class="portlet-body">
				<?php echo form_open($this->uri->uri_string()); ?>
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<?php if ($can_delete && $has_records) : ?>
								<th class='column-check'><input class='check-all' type='checkbox' /></th>
							<?php endif;?>
							<th>
								<i class="fa fa-briefcase"></i> <?php echo lang('campaign_field_name'); ?>
							</th>
							<th class="hidden-xs">
								<i class="fa fa-user"></i> <?php echo lang('campaign_field_budget'); ?>
							</th>
							<th>
								<i class="fa fa-shopping-cart"></i> <?php echo lang('campaign_field_budget_daily'); ?>
							</th>
							<th>
								<i class="fa fa-shopping-cart"></i> وضعیت
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if ($has_records) :
						foreach ($records as $record) :
					?>
					<tr>
						<?php if ($can_delete) : ?>
						<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
						<?php endif;?>
						<td class="highlight">
							<div class="success">
							</div>
							<?php echo anchor('/campaign/edit/index/' . $record->id, ' <span class="icon-pencil"></span> ' .  $record->name); ?>
						</td>
						<td class="hidden-xs">
							 <?php e($record->budget); ?>
						</td>
						<td>
							 <?php e($record->budget_daily); ?>
						</td>
						<td>
							<span class="label label-sm label-success label-mini">فعال</span>
						</td>
						<td>
							<a class="btn default btn-xs purple" href="#"><i class="fa fa-edit"></i> آمار کمپین </a>
							<br />
							<a class="btn default btn-xs purple" href="<?php echo base_url(SITE_AREA . '/content/campaign/edit/' . $record->id); ?>"><i class="fa fa-edit"></i> ویرایش کمپین </a>
							<br />
							<a class="btn default btn-xs purple" href="#"><i class="fa fa-edit"></i> شارژ کمپین </a>
							<br />
							<a class="btn default btn-xs purple" href="#"><i class="fa fa-edit"></i> اضافه کردن صفحات</a>
							<br />
							<a class="btn default btn-xs purple" href="#"><i class="fa fa-edit"></i> صفحات افزوده شده</a>
						</td>
					</tr>
					<?php
					endforeach;
					else:
					?>
					<tr>
						<td colspan='<?php echo $num_columns; ?>'><?php echo lang('campaign_records_empty'); ?></td>
					</tr>
					<?php endif; ?>
					</tbody>
					<?php if ($has_records) : ?>
					<tfoot>
						<?php if ($can_delete) : ?>
						<tr>
							<td colspan='<?php echo $num_columns; ?>'>
								<?php echo lang('bf_with_selected'); ?>
								<input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('campaign_delete_confirm'))); ?>')" />
							</td>
						</tr>
						<?php endif; ?>
					</tfoot>
					<?php endif; ?>
				</table>
				<?php
			    echo form_close();
			    ?>
				<div class="row">
					<div class="col-lg-12">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>