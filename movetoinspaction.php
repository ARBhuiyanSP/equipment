<head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php
include('config.php');

	$id 			= $_POST['id'];
	$product_id 	= $_POST['product_id'];
	$ins_date 		= $_POST['ins_date'];
	$status 		= $_POST['status'];
	$remarks 		= $_POST['remarks'];



	$sql	=	"insert into `inspaction` values('','$product_id','$ins_date','$status','$remarks')";
	mysqli_query($db, $sql);
	
    $sql2	=	"UPDATE `assets`  set `inspaction_date`='$ins_date',`status`='$status' where `eel_code`='$product_id'";
    mysqli_query($db, $sql2);


echo "<script>
				$(document).ready(function(){
				  swal({
					position: 'top-end',
					type: 'success',
					title: 'Good Job.Inspection has been completed',
					showConfirmButton: true
				  }).then(function() {
					window.location = 'inspaction.php?id=$id';
					});
				});
			</script>";

?>