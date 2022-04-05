<?php
require("config.php");
if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "SELECT * From admin_func WHERE id=$id";
	$result = $conn->query($sql);
	if($result->num_rows == 0) {
		header('Location:index.php');
	}
	$sql = "DELETE FROM `admin_func` WHERE id= {$_GET['id']}";
	$conn->query($sql);
	header('Location:index.php');
}  