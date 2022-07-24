
<div class="container">
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<br />
			<form method="post" id="user_form">
				<div class="row" id=""  style="background-color:#fafbf6;color:#000;">
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
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="user_data">
						<tr>
							<th>Button Line</th>
							<th>Button Hole</th>
							<th>Button Type</th>
							<th>Logo Button</th>
							<th>Quantity</th>
							<th>Rate</th>
							<th>Amount</th>
							<th>Revised Rate</th>
							<th>Revised Amount</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</table>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>Mode of Payment</label>
							<select name="mode" class="form-control select2">
								<option>Select</option>
								<option value="Cash">Cash</option>
								<option value="LC">LC</option>
							</select>    
						</div>
					</div>
				</div>
				<input type="hidden" class="form-control" maxlength="30" name="status" value="pending" />	
				<div align="center">
					<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				</div>
			

			<br />
		</div>
		<div id="user_dialog" title="Add Data">
			<div class="col-xs-4">
				<div class="form-group">
					<label>Button Line</label>
					<input type="text" name="button_line" id="button_line" class="form-control" />
					<span id="error_button_line" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Button Hole</label>
					<input type="text" name="button_hole" id="button_hole" class="form-control" />
					<span id="error_button_hole" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Button Type</label>
					<input type="text" name="button_type" id="button_type" class="form-control" />
					<span id="error_button_type" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Logo Button</label>
					<input type="text" name="logo_button" id="logo_button" class="form-control" />
					<span id="error_logo_button" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Quantity</label>
					<input type="text" name="quantity" id="quantity" class="form-control" />
					<span id="error_quantity" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Rate</label>
					<input type="text" name="rate" id="rate" class="form-control" />
					<span id="error_rate" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Total</label>
					<input type="text" name="total" id="total" class="form-control" />
					<span id="error_rate" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Revised Rate</label>
					<input type="text" name="r_rate" id="r_rate" class="form-control" />
					<span id="error_rate" class="text-danger"></span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Revised Amount</label>
					<input type="text" name="r_amount" id="r_amount" class="form-control" />
					<span id="error_rate" class="text-danger"></span>
				</div>
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
		</div>
		<div id="action_alert" title="Action">

		</div>
		</form>
		
		<script>  
$(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:600
	});

	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
		$('#button_line').val('');
		$('#button_hole').val('');
		$('#button_type').val('');
		$('#logo_button').val('');
		$('#quantity').val('');
		$('#rate').val('');
		$('#total').val('');
		$('#r_rate').val('');
		$('#r_amount').val('');
		$('#error_button_line').text('');
		$('#error_button_hole').text('');
		$('#error_button_type').text('');
		$('#error_logo_button').text('');
		$('#error_quantity').text('');
		$('#error_rate').text('');
		$('#error_total').text('');
		$('#button_line').css('border-color', '');
		$('#button_hole').css('border-color', '');
		$('#button_type').css('border-color', '');
		$('#logo_button').css('border-color', '');
		$('#quantity').css('border-color', '');
		$('#rate').css('border-color', '');
		$('#total').css('border-color', '');
		$('#r_rate').css('border-color', '');
		$('#r_amount').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_button_line = '';
		var error_button_hole = '';
		var error_button_type = '';
		var error_logo_button = '';
		var error_quantity = '';
		var error_rate = '';
		var error_total = '';
		var button_line = '';
		var button_hole = '';
		var button_type = '';
		var logo_button = '';
		var quantity = '';
		var rate = '';
		var total = '';
		var r_rate = '';
		var r_amount = '';
		
		if($('#button_line').val() == '')
		{
			error_button_line = 'button_line is required';
			$('#error_button_line').text(error_button_line);
			$('#button_line').css('border-color', '#cc0000');
			button_line = '';
		}
		else
		{
			error_button_line = '';
			$('#error_button_line').text(error_button_line);
			$('#button_line').css('border-color', '');
			button_line = $('#button_line').val();
		}
		
		if($('#button_hole').val() == '')
		{
			error_button_hole = 'button_hole is required';
			$('#error_button_hole').text(error_button_hole);
			$('#button_hole').css('border-color', '#cc0000');
			button_hole = '';
		}
		else
		{
			error_button_hole = '';
			$('#error_button_hole').text(error_button_hole);
			$('#button_hole').css('border-color', '');
			button_hole = $('#button_hole').val();
		}
		
		if($('#button_type').val() == '')
		{
			error_button_type = 'button_type is required';
			$('#error_button_type').text(error_button_type);
			$('#button_type').css('border-color', '#cc0000');
			button_type = '';
		}
		else
		{
			error_button_type = '';
			$('#error_button_type').text(error_button_type);
			$('#button_type').css('border-color', '');
			button_type = $('#button_type').val();
		}
		
		if($('#logo_button').val() == '')
		{
			error_logo_button = 'logo_button is required';
			$('#error_logo_button').text(error_logo_button);
			$('#logo_button').css('border-color', '#cc0000');
			logo_button = '';
		}
		else
		{
			error_logo_button = '';
			$('#error_logo_button').text(error_quantity);
			$('#logo_button').css('border-color', '');
			logo_button = $('#logo_button').val();
		}
		
		if($('#quantity').val() == '')
		{
			error_quantity = 'First Name is required';
			$('#error_quantity').text(error_quantity);
			$('#quantity').css('border-color', '#cc0000');
			quantity = '';
		}
		else
		{
			error_quantity = '';
			$('#error_quantity').text(error_quantity);
			$('#quantity').css('border-color', '');
			quantity = $('#quantity').val();
		}
		
		if($('#rate').val() == '')
		{
			error_rate = 'Last Name is required';
			$('#error_rate').text(error_rate);
			$('#rate').css('border-color', '#cc0000');
			rate = '';
		}
		else
		{
			error_rate = '';
			$('#error_rate').text(error_rate);
			$('#rate').css('border-color', '');
			rate = $('#rate').val();
		}
		
		if($('#total').val() == '')
		{
			error_total = 'Total is required';
			$('#error_total').text(error_rate);
			$('#total').css('border-color', '#cc0000');
			total = '';
		}
		else
		{
			error_total = '';
			$('#error_total').text(error_total);
			$('#total').css('border-color', '');
			total = $('#total').val();
		}
		
		
		
		if(error_button_line != '' || error_button_hole != '' || error_button_type != '' || error_logo_button != '' || error_quantity != '' || error_rate != '' || error_total != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+button_line+' <input type="hidden" name="button_line[]" id="button_line'+count+'" class="button_line" value="'+button_line+'" /></td>';
				output += '<td>'+button_hole+' <input type="hidden" name="button_hole[]" id="button_hole'+count+'" class="button_hole" value="'+button_hole+'" /></td>';
				output += '<td>'+button_type+' <input type="hidden" name="button_type[]" id="button_type'+count+'" class="button_type" value="'+button_type+'" /></td>';
				output += '<td>'+logo_button+' <input type="hidden" name="logo_button[]" id="logo_button'+count+'" class="logo_button" value="'+logo_button+'" /></td>';
				output += '<td>'+quantity+' <input type="hidden" name="quantity[]" id="quantity'+count+'" class="quantity" value="'+quantity+'" /></td>';
				output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+count+'" value="'+rate+'" /></td>';
				output += '<td>'+total+' <input type="hidden" name="total[]" id="total'+count+'" value="'+total+'" /></td>';
				output += '<td>'+r_rate+' <input type="hidden" name="r_rate[]" id="r_rate'+count+'" value="'+r_rate+'" /></td>';
				output += '<td>'+r_amount+' <input type="hidden" name="r_amount[]" id="r_amount'+count+'" value="'+r_amount+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output = '<td>'+button_line+' <input type="hidden" name="button_line[]" id="button_line'+row_id+'" class="button_line" value="'+button_line+'" /></td>';
				output += '<td>'+button_hole+' <input type="hidden" name="button_hole[]" id="button_hole'+row_id+'" class="button_hole" value="'+button_hole+'" /></td>';
				output += '<td>'+button_type+' <input type="hidden" name="button_type[]" id="button_type'+row_id+'" class="button_type" value="'+button_type+'" /></td>';
				output += '<td>'+logo_button+' <input type="hidden" name="logo_button[]" id="logo_button'+row_id+'" class="logo_button" value="'+logo_button+'" /></td>';
				output += '<td>'+quantity+' <input type="hidden" name="quantity[]" id="quantity'+row_id+'" class="quantity" value="'+quantity+'" /></td>';
				output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+row_id+'" value="'+rate+'" /></td>';
				output += '<td>'+total+' <input type="hidden" name="total[]" id="total'+row_id+'" value="'+rate+'" /></td>';
				output += '<td>'+r_rate+' <input type="hidden" name="r_rate[]" id="r_rate'+row_id+'" value="'+r_rate+'" /></td>';
				output += '<td>'+r_amount+' <input type="hidden" name="r_amount[]" id="r_amount'+row_id+'" value="'+r_amount+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			$('#user_dialog').dialog('close');
		}
	});

	$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr("id");
		var quantity = $('#quantity'+row_id+'').val();
		var rate = $('#rate'+row_id+'').val();
		var total = $('#total'+row_id+'').val();
		$('#quantity').val(quantity);
		$('#rate').val(rate);
		$('#total').val(total);
		$('#save').text('Edit');
		$('#hidden_row_id').val(row_id);
		$('#user_dialog').dialog('option', 'title', 'Edit Data');
		$('#user_dialog').dialog('open');
	});

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this row data?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
			return false;
		}
	});

	$('#action_alert').dialog({
		autoOpen:false
	});

	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var count_data = 0;
		$('.quantity').each(function(){
			count_data = count_data + 1;
		});
		if(count_data > 0)
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_data').find("tr:gt(0)").remove();
					$('#action_alert').html('<p>Data Inserted Successfully</p>');
					$('#action_alert').dialog('open');
				}
			})
		}
		else
		{
			$('#action_alert').html('<p>Please Add atleast one data</p>');
			$('#action_alert').dialog('open');
		}
	});
	
	
	
	$(document).ready(function() {
			//this calculates values automatically 
			total();
			$("#quantity, #rate").on("keydown keyup", function() {
				total();  
			});
		});

		function total() {
					var quantity = document.getElementById('quantity').value;
					var rate = document.getElementById('rate').value;
					var result = parseFloat(quantity) * parseFloat(rate);
					if (!isNaN(result)) {
						document.getElementById('total').value = result.toFixed(2);
					}
				}
	
	
	
});  
</script>