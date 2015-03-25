<?php

$num_columns	= 9;
$can_delete	= $this->auth->has_permission('Campaign.Settings.Delete');
$can_edit		= $this->auth->has_permission('Campaign.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
	<h3>
		<?php echo lang('campaign_area_title'); ?>
	</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
					<?php endif;?>
					
					<th><?php echo lang('campaign_field_name'); ?></th>
					<th><?php echo lang('campaign_field_start_date'); ?></th>
					<th><?php echo lang('campaign_field_end_date'); ?></th>
					<th><?php echo lang('campaign_field_budget'); ?></th>
					<th><?php echo lang('campaign_field_budget_daily'); ?></th>
					<th><?php echo lang('campaign_field_bid'); ?></th>
					<th><?php echo lang('campaign_field_category_id'); ?></th>
					<th><?php echo lang('campaign_field_state'); ?></th>
					<th><?php echo lang('campaign_field_device'); ?></th>
				</tr>
			</thead>
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
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/campaign/edit/' . $record->id, '<span class="icon-pencil"></span> ' .  $record->name); ?></td>
				<?php else : ?>
					<td><?php e($record->name); ?></td>
				<?php endif; ?>
					<td><?php e($record->start_date); ?></td>
					<td><?php e($record->end_date); ?></td>
					<td><?php e($record->budget); ?></td>
					<td><?php e($record->budget_daily); ?></td>
					<td><?php e($record->bid); ?></td>
					<td><?php e($record->category_id); ?></td>
					<td><?php e($record->state); ?></td>
					<td><?php e($record->device); ?></td>
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
		</table>
	<?php
    echo form_close();
    
    ?>
</div>