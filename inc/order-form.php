
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
						<div class="col-xs-2">
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
						<div class="col-xs-2">
							<div class="form-group">
								<label>Party Name</label>
								<input type="text" class="form-control" maxlength="100" name="party_name" id="placement" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Party Address</label>
								<input type="text" class="form-control" maxlength="500" name="party_address" id="placement" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Party Ref</label>
								<input type="text" class="form-control" maxlength="100" name="party_ref" id="placement" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Work Order No</label>
								<input type="text" class="form-control" maxlength="30" name="won" id="placement" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Work Order Off</label>
								<input type="text" class="form-control" maxlength="100" name="woof" id="placement" />	
							</div>
						</div>
					</div>
					
					<!----- work orders start ------>
					<div class="row" id="div1"  style="background-color:#fafbf6;color:#000;">
					
					<div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field">
                            <thead>
								<th>Button Line</th>
								<th>Button Hole</th>
								<th>Button Type</th>
								<th>Logo Button</th>
								<th>Qty</th>
								<th>Rate</th>
								<th>Amount</th>
								<th>Revised Rate</th>
								<th>Revised Amount</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td><input type="text" name="button_line[]" placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="button_hole[]" placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="button_type[]" placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="logo_button[]" placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="qty[]" id="qty0" onchange="sum(0)"  placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="rate[]" id="rate0" onchange="sum(0)" placeholder="Enter your Qty" class="form-control name_list"/></td>
									<td><input type="text" name="total[]" id="sum0"  placeholder="Enter your Qty" class="form-control name_list" disabled /></td>
									<td><input type="text" name="r_rate[]" id="rate0" onchange="sum(0)" placeholder="Enter your Rate" class="form-control name_list" /></td>
									<td><input type="text" name="r_amount[]" id="sum0" class="form-control name_list" disabled /></td>
									<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
								</tr>
							</tbody>
                        </table>
                    </div>
					
					</div>
					
					<!----- work orders end ------>
					
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
								<label>Proforma Invoice Number</label>
								<input type="text" class="form-control" maxlength="30" name="pro_in_no" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Proforma Invoice Date</label>
								<input type="text" class="form-control" maxlength="30" name="pro_in_date" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Cash Bill Number</label>
								<input type="text" class="form-control" maxlength="100" name="cash_bill_no" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>LC SL No</label>
								<input type="text" class="form-control" maxlength="30" name="lc_sl_no" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>LC No</label>
								<input type="text" class="form-control" maxlength="30" name="lc_no" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>LC Date</label>
								<input type="text" class="form-control" maxlength="30" name="lc_date" id="" />	
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Total Amount</label>
								<input type="text" class="form-control" maxlength="30" name="total_amount" id="allsum" />
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Pay Amount</label>
								<input type="text" class="form-control" maxlength="30" name="pay_amount" id="tax" />
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Due</label>
								<input type="text" class="form-control" maxlength="30" name="due" id="sum" readonly />
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Mode of Payment</label>
								<select name="mode" class="form-control select2">
									<option>Select</option>
									<option value="Cash">Cash</option>
									<option value="CC">LC</option>
								</select>    
							</div>
						</div>
						
						
						
						 <div class="modal-footer">
							<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
						</div>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal -->

<script>
var i=0;
$(document).ready(function(){
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="button_line[]" placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="button_hole[]" placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="button_type[]" placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="logo_button[]" placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="qty[]" id="qty0" onchange="sum(0)"  placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="rate[]" id="rate0" onchange="sum(0)" placeholder="Enter your Qty" class="form-control name_list"/></td><td><input type="text" name="total[]" id="sum0"  placeholder="Enter your Qty" class="form-control name_list" disabled /></td><td><input type="text" name="r_rate[]" id="rate0" onchange="sum(0)" placeholder="Enter your Rate" class="form-control name_list" /></td><td><input type="text" name="r_amount[]" id="sum0" class="form-control name_list" disabled /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        $('#qty'+i+', #rate'+i).change(function() {
            sum(i)
        });
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
        sum_total();
    });

    $('#submit').click(function(){      
        $.ajax({
            url:"name.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });

});

$(document).ready(function() {
    //this calculates values automatically 
    sum(0);
});

function sum(i) {
    var qty1 = document.getElementById('qty'+i).value;
    var rate1 = document.getElementById('rate'+i).value;
    var result = parseInt(qty1) * parseInt(rate1);
    if (!isNaN(result)) {
        document.getElementById('sum'+i).value = result;
    }
    sum_total();
}
function sum_total() {
    var newTot = 0;
    for (var a=0; a<=i ; a++) {
        aVal = $('#sum'+a);
        if (aVal && aVal.length) { newTot += aVal[0].value ? parseInt(aVal[0].value) : 0; }
    }
    document.getElementById('allsum').value = newTot;
}
</script>
		