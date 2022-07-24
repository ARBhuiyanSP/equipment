<?php 
	session_start();
	require_once("config.php");
include "phpqrcode/qrlib.php";

	// initialize variables
	$id 					= 0;
	$category_id 			= "";
	$brand 					= "";
	$model 					= "";
	$quality 				= "";
	$warrenty 				= "";
	$owner 					= "";
	$dept 					= "";
	$floor 					= "";
	$user 					= "";
	$inventory_sl_no 		= "";
	$purchase_date 			= "";
	$ins_date 				= "";
	$year_manufacture 		= "";
	$price 					= "";
	$bill_note_req_rlp_no 	= "";
	$origin 				= "";
	$update 				= false;

	if (isset($_POST['save'])) {
		
		
		
		
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
		if (!file_exists($pngAbsoluteFilePath)) { 
			QRcode::png($codeContents, $pngAbsoluteFilePath); 
			 
		}
		
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
		$ins_date 				= $_POST['purchase_date'];
		$year_manufacture 		= $_POST['year_manufacture'];
		$price 					= $_POST['price'];
		$bill_note_req_rlp_no 	= $_POST['bill_note_req_rlp_no'];
		$origin 				= $_POST['origin'];

		mysqli_query($db, "INSERT INTO assets (category,brand,model,quality,warrenty,owner,dept,floor,user,inventory_sl_no,purchase_date,year_manufacture,price,bill_note_req_rlp_no,origin,qr_image,inspaction_date) VALUES ('$category_id','$brand','$model','$quality','$warrenty','$owner','$dept','$floor','$user','$inventory_sl_no','$purchase_date','$year_manufacture','$price','$bill_note_req_rlp_no','$origin','$pngAbsoluteFilePath','$ins_date')"); 
		$_SESSION['message'] = "<b style='color:green;'>Assets Saved</b>"; 
		header('location: assets.php');
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