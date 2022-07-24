<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
@media print {    
  .no-print, .no-print * {
    display: none !important;
  }
}
</style>
<script>
function printChecked() {
    const heading = document.querySelector('table > thead > tr');
    const items = document.querySelectorAll('table > tbody > tr');
    for (let i = 0; i < items.length; i++) {
       const tr = items[i];
       const input = tr.querySelector('input[type=checkbox]')
       const isChecked = input.checked

       if (isChecked) {
          heading.classList.remove('no-print');
          tr.classList.remove('no-print');
       }
    }
    window.print();
}
</script>
<body>

  
<div class="container">
  <div class="row">
    <div class="col-lg-12">
		<table class="table">
			<thead>
				<tr class="no-print">
				<th>Sr No</th>   
				<th>Items</th>   
				<th>Date</th>   
				<th>Description</th>   
				<th>Quantity</th>   
				<th>No of Pkgs</th>   
				<th>Pkg Code</th>   
				</tr>
			</thead>
			<tbody>
				<tr class="no-print">
					<td><input type="checkbox" id="1" /></td>
					<td>Mobile</td>
					<td>1/12/2018</td>
					<td>Mobile</td>
					<td>10</td>
					<td>20</td>
					<td>12345</td>
				</tr>
				<tr class="no-print">
					<td><input type="checkbox" id="2" /></td>
					<td>Laptop</td>
					<td>1/12/2018</td>
					<td>Mobile</td>
					<td>10</td>
					<td>20</td>
					<td>12345</td>
				</tr>
				<tr class="no-print">
					<td><input type="checkbox" id="3" /></td>
					<td>Netbook</td>
					<td>1/12/2018</td>
					<td>Mobile</td>
					<td>10</td>
					<td>20</td>
					<td>12345</td>
				</tr>
			</tbody>
		</table>
		<input type="button" class="no-print" onclick='printChecked()' value="Print Selected Items" />
    </div>
  </div>
</div>

</body>
</html>
