<style type="text/css">
.btn150 {
    min-width: 56px;
}
.btn{
	padding: 7px 0;
}
</style>
	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body form">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-advance table-hover">
							<thead>
							<tr>
								<th width="15%">
									 <?php echo $this->lang->line('full name'); ?>
								</th>
								<th width="10%">
									 <?php echo $this->lang->line('username'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('wallet'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('increase_debit'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('creditor'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('debtor'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('month_income'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('total_income'); ?>
								</th>
								<th width="10%"></th>
							</tr>
							</thead>
							<tbody>
							<?php if(isset($query)) :  ?>
							<?php foreach ($query as $row): ?>
							<tr>
								<td>
									 <?php echo "$row->name $row->family" ; ?>
								</td>
								<td>
									 <?php echo $row->username; ?>
								</td>
								<td>
									<?php echo sum_amount($row->id) ?>
								</td>
								<td>
									<?php echo sum_amount($row->id,1,1) ?>
								</td>
								<td>
									<?php echo sum_amount($row->id,1) ?>
								</td>
								<td>
									<?php echo sum_amount($row->id,2) ?>
								</td>
								<td>
									<?php echo sum_amount($row->id,1,'0',30) ?>
								</td>
								<td>
									<?php echo sum_amount($row->id,1,'0') ?>
								</td>
								<td>
									<a href="<?php echo site_url("accounting/credit/index/$row->id"); ?>" class="btn green btn150"><?php echo $this->lang->line('credit'); ?></a>
								</td>
							</tr>
							
							<?php endforeach; ?>
							<?php else : ?>
							<tr><td colspan="9"><h2><?php echo $this->lang->line('credit_not_found'); ?></h2></td></tr>
							<?php endif; ?>
							</tbody>
							</table>
						</div>
						<div class="margin-top-20">
							<div class="pagination">
								<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
				</div>
		</div>
	</div>
		
	</div>
</div>
