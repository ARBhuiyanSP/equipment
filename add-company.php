<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO companies (company_name) VALUES ('$name')"); 
		$_SESSION['message'] = "company saved"; 
		header('location: company.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE companies SET company_name='$name' WHERE id=$id");
	$_SESSION['message'] = "company updated!"; 
	header('location: company.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM companies WHERE id=$id");
	$_SESSION['message'] = "company deleted!"; 
	header('location: company.php');
}