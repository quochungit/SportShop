<?php 
require_once './commons/utils.php';

$sqlSlides = "select * from " . TABLE_SLIDESHOW . "
				where status = 1 
				 order by order_number";

$stmt = $conn->prepare($sqlSlides);
$stmt->execute();

$dataSlides = $stmt->fetchAll();

 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <div class="container-fluid" style="background: #ddd; height: 100px"></div>
 <section class="container-fluid">
	<div class="row">
			<div class="col-xl" style="background: #777; height: 150px;">
		      <h2 style="text-align: center; margin-top: 40; color: #fff">Miễn phí vận chuyển và trả lại</h2>
		    </div>
		    <div class="col-xl" style="background: #666; height: 150px;">
		      <h2 style="text-align: center; margin-top: 40; color: #fff">Giảm giá 20% cho tất cả các loại giày</h2>
		    </div>
		    <div class="col-xl" style="background: #555; height: 150px;">
		      <h2 style="text-align: center; margin-top: 50; color: #fff">Giảm giá 20% cho các VĐV</h2>
		    </div>
	</div>
</section>
<div id="slideShow">
	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php 
				for($i = 0; $i < count($dataSlides); $i++){
					$act = $i == 0 ? "active" : "";
				?>					
					<li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?= $act?>"></li>
				<?php } ?>
			</ol>
			<div class="carousel-inner">
				<?php 
					$count = 0;
				 ?>
				<?php foreach ($dataSlides as $slide): ?>
					<?php
						$active = $count === 0 ? "active" : "";
					?>
					<div class="item <?= $active ?>">
						<img src="<?= $siteUrl . $slide['image']?>">
					</div>
					<?php 
						$count++;
					 ?>
				<?php endforeach ?>
				
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
