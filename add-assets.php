<head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php 
	session_start();
	require_once("config.php");
include "phpqrcode/qrlib.php";


	if (isset($_POST['save'])) {
		
		
		$project_id			= $_POST['project_id'];
		$sub_project_id		= $_POST['sub_project_id'];
		$equipment_type		= $_POST['equipment_type'];
		$from_date			= $_POST['from_date'];
		$to_date 			= $_POST['to_date'];
		$name 				= $_POST['name'];
		$eel_code 			= $_POST['eel_code'];
		$country_of_origin	= $_POST['country_of_origin'];
		$capacity			= $_POST['capacity'];
		$makeby				= $_POST['make_by'];
		$model 				= $_POST['model'];
		$year_manufacture	= $_POST['year_manufacture'];
		$present_location	= $_POST['present_location'];
		$present_condition	= $_POST['present_condition'];
		$remarks 			= $_POST['remarks'];

		mysqli_query($db, "INSERT INTO `assets`(`project_id`,`sub_project_id`,`equipment_type`,`date_from`,`date_to`,`name`,`eel_code`,`origin`,`capacity`,`makeby`,`model`,`year_manufacture`,`inventory_sl_no`,`present_location`,`present_condition`,`price`,`qr_image`,`assign_status`,`inspaction_date`,`remarks`,`status`) VALUES ('$project_id','$sub_project_id','$equipment_type','$from_date','$to_date','$name','$eel_code','$country_of_origin','$capacity','$makeby','$model','$year_manufacture','','$present_location','$present_condition','','','','','$remarks','')"); 
		
		
		
		echo "<script>
			$(document).ready(function(){
			  swal({
				position: 'top-end',
				type: 'success',
				title: 'Good Job.Equipment has been added',
				showConfirmButton: true
			  }).then(function() {
				window.location = 'euipment-list.php';
				});
			});
		</script>";
		
		
	}

// ...
if (isset($_POST['update'])) {
	
	
	
	
		// how to save PNG codes to server 
		$inventory_sl_no 	= $_POST['inventory_sl_no'];
		$purchase_date 			= $_POST['purchase_date'];
		$owner 					= $_POST['owner'];
		$user 					= $_POST['user'];
		 
		$tempDir = "images/qr_images/"; 
		$todaysDate = date('Ymd');
		$model = "M".$_POST['model'];
		$id    = $_POST['id'];
		$codeContents = 'INV SL :'.$inventory_sl_no.'  Purchase Date :'.$purchase_date.'  Owner Division :'.$owner.'  User :'.$user;
		 
		// we need to generate filename somehow,  
		// with md5 or with database ID used to obtains $codeContents... 
		$fileName = time().'qrimage.png'; 
		 
		$pngAbsoluteFilePath = $tempDir.$fileName; 
		$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName; 
		 
		// generating 
		
		
		QRcode::png($codeContents, $pngAbsoluteFilePath); 
	
	
	
	
	$category_id 			= $_POST['category_id'];
	$brand 					= $_POST['brand'];
	$model 					= $_POST['model'];
	$quality 				= $_POST['quality'];
	$warrenty 				= $_POST['warrenty'];
	$owner 					= $_POST['owner'];
	$dept 					= $_POST['dept'];
	$floor 					= $_POST['floor'];
	$user 					= $_POST['user'];
	$inventory_sl_no 		= $_POST['inventory_sl_no'];
	$purchase_date 			= $_POST['purchase_date'];
	$ins_date 				= $_POST['ins_date'];
	$year_manufacture 		= $_POST['year_manufacture'];
	$price 					= $_POST['price'];
	$bill_note_req_rlp_no 	= $_POST['bill_note_req_rlp_no'];
	$origin 				= $_POST['origin'];

	mysqli_query($db, "UPDATE `assets` SET `category`='$category_id',`brand`='$brand',`model`='$model',`quality`='$quality',`warrenty`='$warrenty',`owner`='$owner',`dept`='$dept',`floor`='$floor',`user`='$user',`inventory_sl_no`='$inventory_sl_no',`purchase_date`='$purchase_date',`year_manufacture`='$year_manufacture',`price`='$price',`bill_note_req_rlp_no`='$bill_note_req_rlp_no',`origin`='$origin', `qr_image`='$pngAbsoluteFilePath', `inspaction_date`='$ins_date' WHERE `id`=$id");
	$_SESSION['message'] = "<b style='color:green;'>Assets Updated!</b>"; 
	header('location: assets.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM `assets` WHERE `id`='$id'");
	$_SESSION['message'] = "<b style='color:red;'>Assets deleted!</b>"; 
	header('location: assets.php');
}