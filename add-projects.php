<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];

		mysqli_query($db, "INSERT INTO `projects` (`project_name`) VALUES ('$name')"); 
		$_SESSION['message'] = "project saved"; 
		header('location: projects.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	mysqli_query($db, "UPDATE `projects` SET `project_name`='$name' WHERE `id`='$id'");
	$_SESSION['message'] = "projects updated!"; 
	header('location: projects.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM `projects` WHERE `id`='$id'");
	$_SESSION['message'] = "project deleted!"; 
	header('location: projects.php');
}