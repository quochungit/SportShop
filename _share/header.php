<?php 

$totalItemInCart = 0;
if(isset($_SESSION['CART'])
  && count($_SESSION['CART'])>0){
  $cart = $_SESSION['CART'];
  foreach ($cart as $pro) {
    $totalItemInCart += $pro['quantity'];
  }
}

require_once './commons/utils.php';

$sql = "select * from " . TABLE_WEBSETTING;
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetch();

// var_dump($data);
$sqlCates = "select * from " . TABLE_CATEGORY;

$stmt = $conn->prepare($sqlCates);
$stmt->execute();

$dataCate = $stmt->fetchAll();

?>
    <?php 
    include './_share/client_assets.php';
     ?>
<!DOCTYPE html>
<html>

<section class="container-fluid" style="background: #333; height: 40px; ">
	<div class="row">
			<div class="col-sm-6" style=" height: 75px;">
		      	<div style="margin-top: 10px; background: #333; margin-left: 30px;">
		      		<b style="color: #fff"><i class="far fa-calendar-times"></i> Thời gian làm việc: <?= $data['time'] ?></b>
					<b style="color: #fff; margin-left: 20px;"><i class="fas fa-phone"></i> Hotline: <?= $data['hotline'] ?></b>
		      	</div>
		    </div>
		    <div class="col-sm-6" style="height: 40px; background: #333; clear: both; ">
		      	<div class="dkdn" style="float: right; margin-top: 10px;">
				<a href="<?= $siteUrl?>khach-hang/login.php" class="col"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
				<a href="<?= $siteUrl?>khach-hang/register.php" class="col"><i class="fas fa-user"></i> Đăng ký</a>
				<a href="gh.php" class="col"><i class="fas fa-cart-plus"></i> Giỏ hàng <?= $totalItemInCart ?></a>
				</div>
		    </div>
	</div>
</section>
	
<div class="container-fluid" style="height: 90px; clear: both;">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      	<div class="container-fluid">
	        <a style="margin-left: 10px;" href="index.php">
	        	<img src="<?= $siteUrl . $data['logo'] ?>" alt="logo" height="80px">
	        </a>
	        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="navbarResponsive" ">
	         	<div class="header-menu col-md-12">
					<ul class="nav navbar-nav" style="margin-left: 20px">
						<li>
							<a href="<?= $siteUrl?>">Trang chủ</a>
						</li>
						<li>
							<a href="<?= $siteUrl?>about.php">Giới thiệu</a>
						</li>
						<!-- Danh sach danh muc -->
						 <li class="nav1">
					        <a id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
					          aria-expanded="false">Các Danh mục</a>
					        <div style="background: #343a40;" class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
					            	 <?php foreach ($dataCate as $c): ?>
										<div class="nava"><a href="danhmuc.php?id=<?= $c['id']?>"><?= $c['name']?></a></div>
								 	<?php endforeach ?>
					        </div>
					     </li>
						<!-- <?php foreach ($dataCate as $c): ?>
							<li>
								<a href="danhmuc.php?id=<?= $c['id']?>"><?= $c['name']?></a>
							</li>
						<?php endforeach ?> -->
						<li>
							<a href="<?= $siteUrl?>contact.php">Liên hệ</a>
						</li>
					</ul>
				</div>
	    	</div>

	    	<!-- tìm kiếm -->
	    	<div class="aa" class=" col-md-12" style="margin: auto;">
				<div class="bb">
					<form method="get" action="<?= $siteUrl ?>search.php" class="form-inline my-2 my-lg-0">
         			 <input name="search" class="nav-item form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
        			  <button style=" float: right;" class="nav-item btn  my-2 my-sm-0 btn-search" type="submit">Tìm</button>
       				</form>
				</div>
       			</div>

        </div>
    </nav>
</div>
</html>
<style type="text/css">
	.aa{
		height: 36px;
		width: 20%;
	}
	.aa button{
		margin-right: 30px;
		position: absolute;
		top: 0px;
		right: -80px;
	}
	.aa button:hover{
		border: 1px #FFF solid;
		background: #222;
		color: #fff;
	}
	.aa form{
		margin-right: 30px;
		position: absolute;
		top: 0px;
		right: 40px;
	}
	.bb{
		position: relative;
	}
	.nav1:hover{
		color: red;
	}
	.nav1{
		color: #fff;
	}
	.nava{
		height: 30px;
		background: #343a40;
	}
	.nava:hover{
		background: #eee;
	}
	.nava a{
		color: #fff;
		margin-top: 5px;
		margin-left: 10px;
	}
	.nava a:hover{
		color: red;
		text-decoration: none;
	}
</style>