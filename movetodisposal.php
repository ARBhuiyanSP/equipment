<?php
include('config.php');

	$product_id 	= $_POST['product_id'];
	$disposal_date 	= $_POST['disposal_date'];
	$disposal_value = $_POST['disposal_value'];
	$reason 		= $_POST['reason'];
	$remarks 		= $_POST['remarks'];




	$sql	=	"insert into disposals values('','$product_id','$disposal_date','$disposal_value','$reason','$remarks','','','')";

	mysqli_query($db, $sql);


    $sql2	=	"UPDATE `assets`  set `status`='disposed' where `id`='$product_id'";

    mysqli_query($db, $sql2);

echo "<script>alert('1 Record Update Added')</script>";
ECHO "<script>location.href='disposal-entry.php'</script>";

?>