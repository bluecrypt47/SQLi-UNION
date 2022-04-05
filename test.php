<?php
require("config.php");
if(isset($_GET['id'])) {
	$id = htmlentities($_GET['id']);

	$sql = "SELECT * From admin_func WHERE id=$id";
	$result = $conn->query($sql);
	if($result->num_rows == 0) {
		header('Location:index.php');
	}
	$row = $result->fetch_assoc();
}  

$title = "";
$url = "";
$cve = "";
$osvdb = "";
$author = "";
$file = "";
$cve_id = "";
$type = "";
$platform = "";
$vendor = "";
$content= "";
$payload = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$title = $_POST['title'];
	$url = $_POST['url'];
	$cve = $_POST['cve'];
	$osvdb = $_POST['osvdb'];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$file = $_POST['file'];
	$cve_id = $_POST['cve_id'];
	$type = $_POST['type'];
	$platform = $_POST['platform'];
	$vendor = $_POST['vendor'];
	$content = $_POST['content'];
	$payload = $_POST['payload'];


	$sql = "UPDATE `admin_func` SET `title`='$title',`url`='$url',`cve`='$cve',`osvdb`='$osvdb',`author`='$author',`file`='$file',`cve_id`='$cve_id',`type`='$type',`platform`='$platform',`vendor`='$vendor',`content`='$content' WHERE id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->bind_result();
	if($stmt->execute() === TRUE) {
		header('Location:index.php');
	}
	else {
		echo "Error" . $sql . "</br>" . $conn->error;

	}
}
else {
	header('Location:index.php');
}

?>