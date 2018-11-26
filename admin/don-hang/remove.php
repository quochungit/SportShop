<?php 
require_once '../../commons/utils.php';
$donhangID = $_GET['id'];
$sql = "select * from ".TABLE_DONHANG." where id = $donhangID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$donhang = $stmt->fetch();
if(!$donhang){
	header('location: ' . $adminUrl . "don-hang");
	die;
}

$sql = "delete from ".TABLE_DONHANG." where id = $donhangID";
$stmt = $conn->prepare($sql);
$stmt->execute();

header('location: ' . $adminUrl . "don-hang");
 ?>