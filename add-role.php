<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO roles (name) VALUES ('$name')"); 
		$_SESSION['message'] = "role saved"; 
		header('location: roles.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE roles SET name='$name' WHERE id=$id");
	$_SESSION['message'] = "Role updated!"; 
	header('location: roles.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM roles WHERE id=$id");
	$_SESSION['message'] = "Role deleted!"; 
	header('location: roles.php');
}