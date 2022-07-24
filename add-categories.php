<?php 
	session_start();
	require_once("config.php");

	// initialize variables
	$cat_id = "";
	$name = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$cat_id = $_POST['cat_id'];
		$name 	= $_POST['name'];

		mysqli_query($db, "INSERT INTO `categories` (`cat_id`,`assets_category`) VALUES ('$cat_id','$name')"); 
		$_SESSION['message'] = "category saved"; 
		header('location: categories.php');
	}

// ...
if (isset($_POST['update'])) {
	$id 	= $_POST['id'];
	$cat_id = $_POST['cat_id'];
	$name 	= $_POST['name'];

	mysqli_query($db, "UPDATE `categories` SET `cat_id`='$cat_id' , `assets_category`='$name' WHERE `id`='$id'");
	$_SESSION['message'] = "category updated!"; 
	header('location: categories.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM `categories` WHERE `id`='$id'");
	$_SESSION['message'] = "category deleted!"; 
	header('location: categories.php');
}