<?php
require("config.php");


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
	$file = htmlspecialchars($_POST['file'], ENT_QUOTES);
	$type = htmlspecialchars($_POST['type'], ENT_QUOTES);
	$platform = htmlspecialchars($_POST['platform'], ENT_QUOTES);
	$vendor = htmlspecialchars($_POST['vendor'], ENT_QUOTES);
	$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
	$payload = htmlspecialchars($_POST['payload'], ENT_QUOTES);
	$sql = "INSERT INTO `admin_func`(`title`, `url`, `cve`, `osvdb`, `author`,`file`, `type`, `platform`, `vendor`,`content`,`payload`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sssssssssss',$title,$url,$cve,$osvdb,$author,$file,$type,$platform,$vendor,$content,$payload);
	$stmt->bind_result();
	if($stmt->execute() === TRUE) {
		header('Location:index.php');
	}
	else {
		echo "Error" . $sql . "</br>" . $conn->error;

	}
} else {
	die();
}


?>