<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$id 			= 0;
	$employee_id 	= "";
	$employee_name 	= "";
	$division 		= "";
	$department 	= "";
	$designation 	= "";
	$update 		= false;

	if (isset($_POST['save'])) {
		$employee_id 	= $_POST['employee_id'];
		$employee_name 	= $_POST['employee_name'];
		$division 		= $_POST['division'];
		$department 	= $_POST['department'];
		$designation 	= $_POST['designation'];

		mysqli_query($db, "INSERT INTO employees (employee_id,employee_name,division,department,designation) VALUES ('$employee_id','$employee_name','$division','$department','$designation')"); 
		$_SESSION['message'] = "<b style='color:green;'>Employee Saved</b>"; 
		header('location: employee.php');
	}

// ...
if (isset($_POST['update'])) {
	$id 			= $_POST['id'];
	$employee_id 	= $_POST['employee_id'];
	$employee_name 	= $_POST['employee_name'];
	$division 		= $_POST['division'];
	$department 	= $_POST['department'];
	$designation 	= $_POST['designation'];

	mysqli_query($db, "UPDATE employees SET employee_id='$employee_id',employee_name='$employee_name',division='$division',department='$department',designation='$designation' WHERE id=$id");
	$_SESSION['message'] = "<b style='color:green;'>Employee Updated!</b>"; 
	header('location: employee.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM employees WHERE id=$id");
	$_SESSION['message'] = "<b style='color:red;'>Employee deleted!</b>"; 
	header('location: employee.php');
}