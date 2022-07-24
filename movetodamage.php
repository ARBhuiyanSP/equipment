<?php
include('config.php');

	$product_id 	= $_POST['product_id'];
	$damage_date 	= $_POST['damage_date'];
	$ref 			= $_POST['ref'];
	$remarks 		= $_POST['remarks'];
	$status 		= 'Damage';
	$create 		= date('Y-m-d');




	$sql	=	"insert into product_damage values('','$product_id','$damage_date','$ref','$remarks','$status','$create','')";

	mysqli_query($db, $sql);


    $sql2	=	"UPDATE `assets`  set `status`='damaged' where `inventory_sl_no`='$product_id'";

    mysqli_query($db, $sql2);

echo "<script>alert('1 Record Update Added')</script>";
ECHO "<script>location.href='assets-view.php?id=$product_id'</script>";

?>