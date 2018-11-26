<?php 
require_once './commons/utils.php';

$sql = "select * from " . TABLE_WEBSETTING;
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetch();

 ?>
 <div class="container-fluid" style="height: 480px; background: #333;">
 	<div class="container">
 		<div class="row">
 			<div class="col-xl-6" style=" height: 400px; margin-top: 20px;">
 					<?= $data['map']?>
 			</div>
 			<div class="col-xl-6 aa" style=" height: 400px; color: #fff; font-size: 20px;">
 				<div style="margin-top: 20px;">	
					<a href="index.php"><img src="<?= $siteUrl . $data['logo'] ?>" alt="logo" width="400px">
				</div>
 				<div >
					<a href="#"><p style="font-size: 25; color: #fff; margin-top: 10px;">Đăng ký thành viên để nhận đc ưu đãi</p></a>
				</div>
				<div style="margin-bottom: 10px">
					<b>Gmail:</b>
					<a href="#"><?= $data['email']?></a>
				</div>
				<div style="margin-bottom: 10px">
					<b>Số điện thoại:</b>
					<a href="#"><?= $data['hotline']?></a>
				</div>
				<div style="margin-bottom: 30px">
					<a href="#"><?= $data['fb']?></a>
				</div>
 			</div>
 		</div>
 	</div>
 </div>
<style type="text/css">
 	.aa a{
 		color:#eee;
 	}
 </style>