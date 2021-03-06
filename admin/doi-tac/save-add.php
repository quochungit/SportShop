<?php
session_start();
require_once '../../commons/utils.php';
checkLogin(USER_ROLES['moderator']);
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'doi-tac');
	die;
} 
$name = $_POST['name'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'img/doitac/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);

if(!$name){
	header('location: ' . $adminUrl . 'doi-tac/add.php?errName=Vui lòng nhập tên đối tác');
	die;
}
$sql=" SELECT * FROM `brands`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll();
foreach ($cate as $c) {
	if (strtolower($name) == strtolower($c['name'])) {
		header('location: ' . $adminUrl . 'doi-tac/add.php?errName=Trùng tên đối tác cũ!!!');
	die;
	}
}

$sql= "insert into brands (image, name)
		values 
		(:image, :name)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":image", $filename);
$stmt->bindParam(":name", $name);
$stmt->execute();
header('location: ' . $adminUrl . 'doi-tac?success=true');
 ?>
