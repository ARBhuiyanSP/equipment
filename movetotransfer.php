<head>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php
include('config.php');

	$eel_code 		= $_POST['eel_code'];
	$project_id 	= $_POST['project_id'];
	$equipment_type	= $_POST['equipment_type'];
	$assign_date 	= $_POST['assign_date'];
	$remarks 		= $_POST['remarks'];
	$id 			= $_POST['id'];

	$sql	=	"insert into `equipment_assign` values('','$eel_code','$project_id','','$equipment_type','$assign_date','','$remarks')";
	mysqli_query($db, $sql);

    $sql2	=	"UPDATE `equipment_assign` set `refund_date`='$assign_date' where `id`='$id'";
    mysqli_query($db, $sql2);

	echo "<script>
				$(document).ready(function(){
				  swal({
					position: 'top-end',
					type: 'success',
					title: 'Good Job.Equipment has been shifted to...',
					showConfirmButton: true
				  }).then(function() {
					window.location = 'assign-list.php';
					});
				});
			</script>";

?>