	<!-- BEGIN PAGE CONTENT-->
		<div class="row pay-online">
			<div class="col-md-12">
				<!-- BEGIN PORTLET-->
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i> <?php echo $this->lang->line('increase_debit'); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<?php echo form_open('accounting/increase', 'class="form-horizontal"'); ?>
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label"><?php echo $this->lang->line('amount'); ?></label>
									<div class="col-md-4">
										<div id="slider-price" class="noUi-control noUi-danger">
										</div>
										<div class="input-group input-medium margin-top-20">
											<input type="hidden" name="amount" class="form-control" id="amount">
										</div>
									</div>
									<div class="col-md-4">
										<label style="display:none;" id="price-preview" class="control-label"><strong></strong> تومان</label>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn green pull-right" type="submit"><?php echo $this->lang->line('pay'); ?></button>
										<div id="price" class=""></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- END PORTLET-->
			</div>
		</div>		
	</div>
</div>
<!-- END CONTENT -->
	
<script>


jQuery(document).ready(function() {
	$("#price-preview").css("display", "table");
	$("#slider-price").noUiSlider({
		start: [ 20000 ],
		step: 1000,
		connect: "lower",
		direction: "rtl",
		range: {
			'min': [ 5000 ],
			'max': [ 1000000 ]
		},
		format: wNumb({
			decimals: 0,
			thousand: ','
		}),

		
	});

	$("#slider-price").Link('lower').to($('#price-preview strong'));
	$("#slider-price").Link('lower').to($('#amount'),function(event) {
		var find = ',';
		var re = new RegExp(find, '');
		str = $("#slider-price").val();
		str = str.replace(re, '');
		str = str.replace(re, '');
		$("#amount").val(str);
	});


	
	$("#slider-price").mouseup(function(event) {

		// var find = ',';
		// var re = new RegExp(find, '');
		// str = $("#slider_2").val();
		// str = str.replace(re, '');
		// str = str.replace(re, '');
		// $("#amount").val(str);
	});

	// $('#slider_2').noUiSlider({
	// 	start: [ 4000 ],
	// 	range: {
	// 		'min': [  5000 ],
	// 		'max': [ 1000000 ]
	// 	},

	// });
	// $("#slider_2").Link('lower').to($('#slider_2_input_start'));
  //  Demo.init(); // init demo features
  //   // slider 2
  //   $('#slider_2').noUiSlider({
  //       direction: "rtl",
  //       range: {
  //           min: 20,
  //           max: 400000
  //       },
  //       start: 100,
		// step: 10,
  //       connect: 'lower',
  //       serialization: {
  //           lower: [
  //               $.Link({
  //                   target: $("#slider_2_input_start"),
  //                   method: "val"
  //               })
  //           ]
  //       }
  //   });
});
</script>