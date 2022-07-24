<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO divisions (division_name) VALUES ('$name')"); 
		$_SESSION['message'] = "division saved"; 
		header('location: division.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE divisions SET division_name='$name' WHERE id=$id");
	$_SESSION['message'] = "division updated!"; 
	header('location: division.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM divisions WHERE id=$id");
	$_SESSION['message'] = "division deleted!"; 
	header('location: division.php');
}