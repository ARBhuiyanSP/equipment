<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO departments (dept_name) VALUES ('$name')"); 
		$_SESSION['message'] = "department saved"; 
		header('location: department.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE departments SET dept_name='$name' WHERE id=$id");
	$_SESSION['message'] = "department updated!"; 
	header('location: department.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM departments WHERE id=$id");
	$_SESSION['message'] = "department deleted!"; 
	header('location: department.php');
}