<?php
include('config.php');

	$id 			= $_POST['id'];
	$product_id 	= $_POST['product_id'];
	$refund_date 	= $_POST['refund_date'];
	$status 		= 'Refund';




	$sql	=	"UPDATE `product_assign`  set `refund_date`='$refund_date', `status`='$status' where `id`='$id'";

	mysqli_query($db, $sql);

    $sql2	=	"UPDATE `assets`  set `assign_status`='' where `id`='$product_id'";

    mysqli_query($db, $sql2);

echo "<script>alert('1 Record Update Added')</script>";
ECHO "<script>location.href='assign-list.php'</script>";

?>