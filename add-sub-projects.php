<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$pro_id = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$pro_id = $_POST['pro_id'];

		mysqli_query($db, "INSERT INTO `sub_projects` (`pro_id`,`name`,`address`,`status`) VALUES ('$pro_id','$name','$address','')"); 
		$_SESSION['message'] = "project saved"; 
		header('location: sub-projects.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pro_id = $_POST['pro_id'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE `sub_projects` SET `pro_id`='$pro_id',`name`='$name',`address`='$address' WHERE `id`='$id'");
	$_SESSION['message'] = "sub projects updated!"; 
	header('location: sub-projects.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM `sub_projects` WHERE `id`='$id'");
	$_SESSION['message'] = "sub project deleted!"; 
	header('location: sub-projects.php');
}