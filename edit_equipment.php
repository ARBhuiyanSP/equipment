<head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php
session_start();
require_once("config.php");
include "phpqrcode/qrlib.php";

if(isset($_POST['submit'])){
		
		$id					= $_POST['id'];
		$project_id			= $_POST['project_id'];
		$sub_project_id		= $_POST['sub_project_id'];
		$equipment_type		= $_POST['equipment_type'];
		$from_date			= $_POST['from_date'];
		$to_date 			= $_POST['to_date'];
		$name 				= $_POST['name'];
		$eel_code 			= $_POST['eel_code'];
		$country_of_origin	= $_POST['country_of_origin'];
		$capacity			= $_POST['capacity'];
		$makeby				= $_POST['makeby'];
		$model 				= $_POST['model'];
		$year_manufacture	= $_POST['year_manufacture'];
		$present_location	= $_POST['present_location'];
		$present_condition	= $_POST['present_condition'];
		$remarks 			= $_POST['remarks'];

	
	$sql = "UPDATE `assets` SET `project_id`='$project_id',`sub_project_id`='$sub_project_id',`equipment_type`='$equipment_type',`date_from`='$from_date',`date_to`='$to_date',`name`='$name',`eel_code`='$eel_code',`origin`='$country_of_origin',`capacity`='$capacity',`makeby`='$makeby',`model`='$model',`year_manufacture`='$year_manufacture',`present_location`='$present_location',`present_condition`='$present_condition',`remarks`='$remarks' WHERE `id`='$id'";

	mysqli_query($db, $sql);


	echo "<script>
			$(document).ready(function(){
			  swal({
				position: 'top-end',
				type: 'success',
				title: 'Data has been updated',
				showConfirmButton: true
			  }).then(function() {
				window.location = 'equipment_edit.php?id=$id';
				});
			});
		</script>";
	
	

}
?>