<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function($){

$('.my-form .add-box').click(function(){

var n = $('.text-box').length + 1;

if( 9 < n ) {

alert('Stop it!');

return false;

}

var box_html = $('<p class="text-box"><div class="col-xs-3"><div class="form-group"><label>Work Order No</label><input type="text" class="form-control" maxlength="30" name="won[]" id="placement" /></div></div><div class="col-xs-3"><div class="form-group"><label>Button Line</label><select name="button_line[]" class="form-control select2"><option>Select</option><option value="Cash">Cash</option><option value="CC">CC</option></select></div></div></p>');

box_html.hide();

$('.my-form p.text-box:last').after(box_html);

box_html.fadeIn('slow');

return false;

});

$('.my-form').on('click', '.remove-box', function(){

// $(this).parent().css( 'background-color', '#FFFFFF' );

$(this).parent().fadeOut("slow", function() {

$(this).remove();

$('.box-number').each(function(index){

$(this).text( index + 1 );

});

});

return false;

});

});

</script>




<!-- sample modal content -->
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="full-width-modalLabel">Add New Order</h4>
            </div>
            <div class="modal-body">
                <form class="demo-box" action="add-order.php" method="post">
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>Date</label>
								<div>
									<div class="input-group">
										<input name="date" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
										<span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
									</div><!-- input-group -->
								</div>
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>Party Name</label>
								<input type="text" class="form-control" maxlength="30" name="party_name" id="placement" />	
							</div>
						</div>
					</div>
					
					<!----- work orders start ------>
					
					
					
					<div class="row" id="div1"  style="background-color:#fafbf6;color:#000;border:1px solid gray;">
					<div class="my-form">
							<p class="text-box">
								<div class="col-xs-3">
									<div class="form-group">
										<label>Work Order No</label>
										<input type="text" class="form-control" maxlength="30" name="won[]" id="placement" />	
									</div>
								</div>
								<div class="col-xs-3">
									<div class="form-group">
										<label>Button Line</label>
										<select name="button_line[]" class="form-control select2">
											<option>Select</option>
											<option value="Cash">Cash</option>
											<option value="CC">CC</option>
										</select>    
									</div>
									<a class="add-box" href="#">Add Another Order</a><br />
								</div>
								
							</p>
					</div>
					</div>
					
					<!----- work orders end ------>
					
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>Proforma Invoice Number</label>
								<input type="text" class="form-control" maxlength="30" name="pro_in_no" id="placement" />	
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label> Amount</label>
								<input type="text" class="form-control" maxlength="30" name="amount" id="baseFare" />
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>Pay Amount</label>
								<input type="text" class="form-control" maxlength="30" name="pay_amount" id="tax" />
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label>Due</label>
								<input type="text" class="form-control" maxlength="30" name="due" id="sum" readonly />
							</div>
						</div>
						
						
						
						 <div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
						</div>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal -->
		<script>
		$(document).ready(function() {
			//this calculates values automatically 
			sum();
			$("#baseFare, #tax").on("keydown keyup", function() {
				sum();
			});
		});

		function sum() {
					var baseFare = document.getElementById('baseFare').value;
					var tax = document.getElementById('tax').value;
					var result = parseInt(baseFare) - parseInt(tax);
					if (!isNaN(result)) {
						document.getElementById('sum').value = result;
					}
				}
		</script>
		<script>
		$(document).ready(function() {
			//this calculates values automatically 
			subt();
			$("#sum, #sellingPrice").on("keydown keyup", function() {
				subt();
			});
		});

		function subt() {
					var sum = document.getElementById('sum').value;
					var sellingPrice = document.getElementById('sellingPrice').value;
					var result = parseInt(sellingPrice)- parseInt(sum);
					if (!isNaN(result)) {
						document.getElementById('subt').value = result;
					}
				}
		</script>