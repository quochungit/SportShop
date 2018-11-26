<?php 
session_start();
$totalItemInCart = 0;
if(isset($_SESSION['CART'])
  && count($_SESSION['CART'])>0){
  $cart = $_SESSION['CART'];
  foreach ($cart as $pro) {
    $totalItemInCart += $pro['quantity'];
  }
}

 ?>

<?php 
require_once './commons/utils.php';
$id = $_GET['id'];

// 1. Kiem tra xem id danh muc co thuc su ton tai khong
$sql = "select 
				c.*,
				(select count(*) from products where cate_id = $id) as total_product
		from ".TABLE_CATEGORY." c
		where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
	header("location: $siteUrl" . "index.php");
	die;
}

$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 9;
$offset = ($pageNumber-1)*$pageSize;

// 2. lay danh sach san pham thuoc danh muc
$sql = "select * from " . TABLE_PRODUCT 
		. " where cate_id = $id limit $offset, $pageSize";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

// lay du lieu tu csdl bang doi tac

?>

<!DOCTYPE html>
<html lang="en">
	 <?php 
    	include './_share/client_assets.php';
     ?>
	<title><?= $cate['name']?></title>
</head>
 
<body>
	<?php 
	include './_share/header.php';
	 ?>
	 <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <!-- phân trang -->
         <link rel="stylesheet" type="text/css" href="plugin/simplePagination/simplePagination.css">
  		 <script src="plugins/simplePagination/jquery.simplePagination.js" type="text/javascript"></script>

	<div style="background: #fff; height: 50px"></div>
	<div id="product">
		<div class="container-filud" class="tittle-product">
				<div class="container hh">
					<h2 style="position: absolute; top: -13px; left: 10px; color: #333">Danh mục: <?= $cate['name']?></h2>
				</div>
		</div>
		<div class="container-filud" style="background: #eee;">
			<div class="container" style="background: #fff; ">
			<div class="row" style="margin-top: 10px;">
				<?php foreach ($products as $np): ?>
					<div class="col-sm-4 col-xs-12">
						<div class="img-height sp2">
							<a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
						</div>
						<div id="namesp" style="margin-top: 10px">
							<a class="title-name" href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>"><?= $np['product_name']?></a>
						</div>
						<div class="text-center">
							Giá bán <a class="">
								<strike>
									<?= $np['list_price']?>Đ
								</strike>
								</a>
							<br>
							Giá khuyến mại <a class=""><?= $np['sell_price']?>Đ</a>
						</div>
						<div class="footer-product" style="margin-left: 50px; margin-bottom: 30px;">
							<a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>" class="details">Xem chi tiết</a>
						</div>
					</div>
				<?php endforeach ?>

			</div>
		</div>
			<div class="row">
				<div class="paginate"></div>
			</div>
		</div>
	</div>
 
	<?php 
         include './_share/brand.php';
    ?>
    <div style="height: 80px"></div>
	<?php 
	 include './_share/footer.php';
	 ?>
<!-- 	<script type="text/javascript">
	 	var pageUrl = '<?= $siteUrl. "danhmuc.php?id=" . $id?>';
	 	$('.paginate').pagination({
	        items: <?=$cate['total_product']?>,
	        currentPage: <?= $pageNumber?>, 
	        itemsOnPage: <?= $pageSize?>,
	        cssStyle: 'light-theme',
	        onPageClick: function(val){
	        	window.location.href = pageUrl+`&page=${val}`;
	        }
	    });
	 </script> -->
	 
</body>

</html>
<style type="text/css"> 
.hh{width: 100%; height: 50px; background: #eee; position: relative; margin-top: 10px;
}
</style>