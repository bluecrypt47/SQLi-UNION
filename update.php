<?php
require("config.php");
if(isset($_GET['id'])) {
	$id = htmlentities($_GET['id']);

	$sql = "SELECT * From admin_func WHERE id=$id";
	$result = $conn->query($sql);
	if($result->num_rows == 0) {
		header('Location:index.php');
	}
	// $row = $result->fetch_assoc();
 


	$title = "";
	$url = "";
	$cve = "";
	$osvdb = "";
	$author = "";
	$file = "";
	$type = "";
	$platform = "";
	$vendor = "";
	$content = "";
	$payload = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
		$url = htmlspecialchars($_POST['url'], ENT_QUOTES);
		$cve = htmlspecialchars($_POST['cve'], ENT_QUOTES);
		$osvdb = htmlspecialchars($_POST['osvdb'], ENT_QUOTES);
		$author = htmlspecialchars($_POST['author'], ENT_QUOTES);
		$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
		$file = htmlspecialchars($_POST['file'], ENT_QUOTES);
		$type = htmlspecialchars($_POST['type'], ENT_QUOTES);
		$platform = htmlspecialchars($_POST['platform'], ENT_QUOTES);
		$vendor = htmlspecialchars($_POST['vendor'], ENT_QUOTES);
		$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
		$payload = $_POST['payload'];
		$sql = "UPDATE `admin_func` SET `title`='$title',`url`='$url',`cve`='$cve',`osvdb`='$osvdb',`author`='$author',`file`='$file',`type`='$type',`platform`='$platform',`vendor`='$vendor',`content`='$content', `payload`='$payload' WHERE id = ?";
		$stmt = $conn->prepare($sql);
		var_dump($stmt);	
		$stmt->bind_param('i',$id);
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
} 
?>