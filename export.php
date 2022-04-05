<?php 
require("config.php");
if(isset($_GET['id'])) {
	$id = htmlentities($_GET['id']);
	$sql = "SELECT *  FROM `admin_func` INNER JOIN `payload` ON admin_func.payload = payload.id WHERE admin_func.id =  {$_GET['id']}";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		header('Location:index.php');
	}
	$row = $result->fetch_assoc();
	$sql2 = "SELECT * FROM admin_func WHERE id=$id";
	$result2 = $conn->query($sql2);
	$roww = $result2->fetch_assoc();
	$t = $roww['id'];
	$file = fopen("./export/$t.".$row['extension'], "w");
	$text = $row['content'];
	$w = fwrite($file, $text);
	fclose($file);
	if(isset($w)) {
		header("Content-Type: text/plain");
		header("Location:/project/export/$t.".$row['extension']);
	}
	else {
		echo "Error";
	}
}
?>