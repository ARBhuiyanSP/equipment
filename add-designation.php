<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO designations (deg_name) VALUES ('$name')"); 
		$_SESSION['message'] = "designation saved"; 
		header('location: designation.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE designations SET deg_name='$name' WHERE id=$id");
	$_SESSION['message'] = "designation updated!"; 
	header('location: designation.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM designations WHERE id=$id");
	$_SESSION['message'] = "designation deleted!"; 
	header('location: designation.php');
}