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
 <!--  sản phẩm mới nhất -->
  <div class="container-fluid" style="height: 300px;  margin-bottom: 100px">
      <div class="row">
          <div class="col-xl-6 banner" >
            <div class="overlay">
                <div class="text" style=" font-size: 30px;  margin-bottom: -40px">
                    <b>Giảm 20% Tất cả loại giày</b><br>
                </div>
                    <div class="a1"><a href="#">Xem ngay</a></div>
                    <style type="text/css">.a1 a{font-size: 30px;} </style>
            </div>
          </div>
          <div class="col-xl-6 banner2" >
              <section class="overlay">
                  <section class="text" style="margin-bottom: -40px" >
                      <b>Áo Các CLB Ngoại Hạng Anh</b><br>
                  </section>
                  <div class="a1"><a href="#">Xem ngay</a></div>
                    <style type="text/css">.a1 a{font-size: 30px;} </style>
              </section>
          </div>
      </div>
  </div>
  <div class="container-fluid" style="height: auto; background: #ccc;">
        <div id="product">
    <div class="container">
      <div class="tittle-product">
        <div class="tt">
          <h2 style="float: left;">Sản phẩm mới</h2>
        </div>
      </div>
      <?php foreach ($newProducts as $np): ?>
        <div class="col-sm-4 col-xs-12">
          <div class="img-height">
            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
            <div class="footer-product">              
              <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>" class="details"" class="details">Xem chi tiết</a>
              <a href="addcart.php?id=<?=$np['id']?>" class="buying">Mua hàng</a>
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
    <div class="box-footer clearfix">
            <div class="paginate light-theme simple-pagination">
            </div>
        </div>
  </div>
  <div id="hot-product">
    <div class="container">
      <div class="tittle-product">
        <div class="tt">
          <h2>Sản phẩm bán chạy</h2>
        </div>
      </div>
      <style type="text/css"> .tt1{width: 100%;}</style>
      <?php foreach ($mostViewsProducts as $np): ?>
        <div class="col-sm-4 col-xs-12">
          <div class="img-height">
            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
            <div class="footer-product">              
              <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>" class="details"" class="details">Xem chi tiết</a>
              <a href="addcart.php?id=<?=$np['id']?>" class="buying">Mua hàng</a>
            </div>
          </div>
          <a class="title-name"><?= $np['product_name']?></a>
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
      <div class="box-footer clearfix">
                  <div class="paginate light-theme simple-pagination"></div>
          </div>
  </div>
  </div>
</body>















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