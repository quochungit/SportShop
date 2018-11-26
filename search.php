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
// 1. Kiem tra xem id danh muc co thuc su ton tai khong
if($_SERVER['REQUEST_METHOD'] != 'GET'){
  header("location: $siteUrl" . "index.php");
  die;
}
$name = $_GET['search'];
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 3;
$offset = ($pageNumber - 1) * $pageSize;
// 2. lay danh sach san pham thuoc danh muc
$sql = " select * FROM products WHERE product_name LIKE '%$name%' "; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
$notf = "";
if (!$products) {
  $notf = "Không tìm thấy sản phẩm";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
include './_share/client_assets.php';
?>

	<title>Tìm kiếm sản phẩm</title>
 <!--  <link rel="stylesheet" type="text/css" href="plugins/simplePagination/simplePagination.css">
  <script src="plugins/simplePagination/jquery.simplePagination.js" type="text/javascript"></script> -->
</head>
<body>
    <?php 
    include './_share/header.php';
    ?>
    <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         
<div class="container">
     <div class="tittle-cate">
			</div>
    <!-- /.row --> 
    <div style="height: 60px; background: #eee; border: 1px red solid; margin-top: 10px;">
      <h3 style="margin-left: 10px;">Tìm kiếm "<?= $name ?>"</h3>
    </div>
    
    <br>
    <h4><?= $notf ?></h4>
    <div class="row">
      <?php foreach ($products as $np) : ?>
      <div class="col-sm-4 col-xs-12">
          <div class="img-height sp2">
            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
            <div class="footer-product">
              <a href="<?=$siteUrl?>save-cart.php?id=<?=$np['id']?>" class="buying" name="btn_add">Mua hàng</a>
              <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>" class="details" >Xem chi tiết</a>  
            </div>
          </div>
          <div id="namesp">
            <a class="title-name" href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><?= $np['product_name']?></a>
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
        </div>
      <?php endforeach ?>
    </div>
    <!-- phan trang -->
    <!-- phan trang -->
</div>
<br>
<div id="partner">
      <?php 
        include './_share/brand.php';
       ?>
</div>
  </div><br>
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->
<script type="text/javascript">
	 	var pageUrl = '<?= $siteUrl . "danhmuc.php?id=" . $id ?>';
	 	$('.paginate').pagination({
	        items: <?= $cate['total_product'] ?>,
	        currentPage: <?= $pageNumber ?>, 
	        itemsOnPage: <?= $pageSize ?>,
	        cssStyle: 'light-theme',
	        onPageClick: function(val){
	        	window.location.href = pageUrl+`&page=${val}`;
	        }
	    });
</script>
</body>
</html>