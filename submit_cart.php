<?php
session_start();


require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . '');
	die;
}
$tenkh = $_POST['tenkh'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
$ghichu = $_POST['ghichu'];
$tonggia = $_POST['tonggia'];

$sql= "insert into donhang (tenkh, email, sdt, diachi, ghichu, tonggia)
		values 
		(:tenkh,:email, :sdt, :diachi, :ghichu, :tonggia)";

$stmt = $conn->prepare($sql); 
$stmt->bindParam(":tenkh", $tenkh);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":sdt", $sdt);
$stmt->bindParam(":diachi", $diachi);
$stmt->bindParam(":tonggia", $tonggia);
$stmt->bindParam(":ghichu", $ghichu);
$stmt->execute();


 ?>

<script>alert('Đã đặt hàng thành công, chúng tôi sẽ liên lạc với bạn ngay'); location.href='gh.php'</script>";
 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = '<?= $siteUrl ?>';
 	}, 1000);
 </script>

