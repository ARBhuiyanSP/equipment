<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="container">
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<br />
			<form method="post" id="user_form">
				
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" id="" class="form-control" />
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="user_data">
						<tr>
							<th>Quantity</th>
							<th>Rate</th>
							<th>Total</th>
							<th>Details</th>
							<th>Remove</th>
						</tr>
					</table>
				</div>
				<div align="center">
					<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				</div>
			</form>

			<br />
		</div>
		<div id="user_dialog" title="Add Data">
			<div class="form-group">
				<label>Quantity</label>
				<input type="text" name="quantity" id="quantity" class="form-control" />
				<span id="error_quantity" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Rate</label>
				<input type="text" name="rate" id="rate" class="form-control" />
				<span id="error_rate" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Total</label>
				<input type="text" name="total" id="total" class="form-control" />
				<span id="error_rate" class="text-danger"></span>
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
		</div>
		<div id="action_alert" title="Action">

		</div>
		
		
<script>  
$(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
		$('#quantity').val('');
		$('#rate').val('');
		$('#total').val('');
		$('#error_quantity').text('');
		$('#error_rate').text('');
		$('#error_total').text('');
		$('#quantity').css('border-color', '');
		$('#rate').css('border-color', '');
		$('#total').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_quantity = '';
		var error_rate = '';
		var error_total = '';
		var quantity = '';
		var rate = '';
		var total = '';
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
		
		if(error_quantity != '' || error_rate != '' || error_total != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+quantity+' <input type="hidden" name="quantity[]" id="quantity'+count+'" class="quantity" value="'+quantity+'" /></td>';
				output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+count+'" value="'+rate+'" /></td>';
				output += '<td>'+total+' <input type="hidden" name="total[]" id="total'+count+'" value="'+total+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output = '<td>'+quantity+' <input type="hidden" name="quantity[]" id="quantity'+row_id+'" class="quantity" value="'+quantity+'" /></td>';
				output += '<td>'+rate+' <input type="hidden" name="rate[]" id="rate'+row_id+'" value="'+rate+'" /></td>';
				output += '<td>'+total+' <input type="hidden" name="total[]" id="total'+row_id+'" value="'+rate+'" /></td>';
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