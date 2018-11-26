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

$newProductsQuery = " select * 
            from ".TABLE_PRODUCT." 
            order by id desc 
            limit 6";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();
$newProducts = $stmt->fetchAll();

// lay du lieu tu csdl bang products cho sp xem nhieu nhat
$mostViewsQuery = " select * 
            from ".TABLE_PRODUCT."  
            order by views desc
            limit 6";
$stmt = $conn->prepare($mostViewsQuery);
$stmt->execute();

$mostViewsProducts = $stmt->fetchAll();
 ?>

<!DOCTYPE php>
<html lang="en">
  <title>Sport  Shop</title>
    <?php 
    include './_share/client_assets.php';
     ?>
    <!-- Header -->
    <?php 
     include './_share/header.php';
     ?>
     <!-- slider -->
        <?php 
              include './_share/slider.php';
         ?> 
<body>
<div class="container-fluid" style="background: #ddd; height: 50px"></div>
 <!--  Sản Phẩm mới -->
<div class="container-fluid" style="background: #ddd; height: auto;">
    <div class="container-fluid" style=" background: #ddd ">
        <div style="background: #ddd; height: 50px;"></div>
        <div class="container sp1" style="background: #fff; height: 90px">
            <center><h2>Sản Phẩm Mới Nhất</h2></center>
        </div>
    </div>
    <div class="container sp" style="background: #fff; margin-top: 50px">
        <?php foreach ($newProducts as $np): ?>
        <div class="col-sm-4 col-xl-12">
          <div class="img-height" style="margin-top: 10px;">
            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
            <div class="footer-product">              
              <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>" class="details"" class="details">Xem chi tiết</a>
              <a href="<?=$siteUrl?>save-cart.php?id=<?=$np['id']?>" class="buying">Mua hàng</a>
            </div>
          </div>
          <div id="namesp">
            <a class="title-name" href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><?= $np['product_name']?></a>
          </div>
          <div class="text-center">
            Giá bán <a class="">
              <strike>
                <?= $np['list_price']?> Đ
              </strike>
              </a>
            <br>
            Giá khuyến mại <a class=""><?= $np['sell_price']?> Đ</a>
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <div class="container-fluid" style="height: 50px; background: #ddd;"></div>

    <div class="container-fluid" style=" background: #ddd ">
        <div style="background: #ddd; height: 50px;"></div>
        <div class="container sp1" style="background: #fff; height: 90px">
            <center><h2>Sản Phẩm Đang Hot</h2></center>
        </div>
    </div>
    <div class="container sp2" style="background: #fff; margin-top: 50px;">
      <?php foreach ($mostViewsProducts as $np): ?>
        <div class="col-sm-4 col-xl-12">
          <div class="img-height" style="margin-top: 10px;">
            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
            <div class="footer-product">              
              <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>" class="details"" class="details">Xem chi tiết</a>
              <a href="<?=$siteUrl?>save-cart.php?id=<?=$np['id']?>" class="buying">Mua hàng</a>
            </div>
          </div>
          <div id="namesp">
            <a class="title-name" href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><?= $np['product_name']?></a>
          </div>
          <div class="text-center">
            Giá bán <a class="">
              <strike>
                <?= $np['list_price']?> Đ
              </strike>
              </a>
            <br>
            Giá khuyến mại <a class=""><?= $np['sell_price']?> Đ</a>
          </div>
        </div>
      <?php endforeach ?>
</div>
</body>
<div style="background: #ddd; height: 30px;"></div>

<?php 
     include './_share/brand.php';
?> 
<div style="height: 80px"></div>
<?php 
     include './_share/footer.php';
?> 













<style type="text/css">
  .banner{
  background: url(img/giay2.jpg); 
  height: 300px;
  position: relative;
  background-size: cover;
}
  .banner2{
  background: url(img/2.jpg); 
  height: 300px;
  position: relative;
  background-size: cover;
}
.overlay {
            width: 100%;
            bottom: 100%;
            height: 0px;
            background-color: #DDDDDD;
            position: absolute;
            left: 0px;
            color: #333;
            text-align: center;
            line-height: 120px;
            text-transform: uppercase;
            cursor: pointer;
            transition: .5s ease;
            opacity: .9;
        }

        .banner2:hover .overlay {
            bottom: 0;
            height: 100%;
        }
        .banner:hover .overlay {
            bottom: 0;
            height: 100%;
        }
        .text{
          font-size: 30px;
        }
        .text a{
          font-size: 30px;
        }
</style>