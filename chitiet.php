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
$cate_id=$_GET['cate'];

$commentSql = "select * from " . TABLE_COMMENT
				. " where product_id = $id order by id desc";

$stmt = $conn->prepare($commentSql);
$stmt->execute();
$comments = $stmt->fetchAll();

$newProductsQuery = "	select * 
						from ".TABLE_PRODUCT." 
						where id = $id";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();

$newProducts = $stmt->fetchAll();


//sp liên quan
$splq="select * from " . TABLE_PRODUCT . " where id not in ('$id') and cate_id='$cate_id' limit 4";
$stmt= $conn->prepare($splq);
$stmt->execute();
$cateP = $stmt->fetchAll();

// lay du lieu tu csdl bang doi tac
$newBrandsQuery = "	select * 
						from ".TABLE_BRANDS." 
						order by id desc limit 4
						";
$stmt = $conn->prepare($newBrandsQuery);
$stmt->execute();

//đối tác
$newBrands = $stmt->fetchAll();
$updateView = "update products set views = views +1 where id = '$id'";
$stmt = $conn->prepare($updateView);
$stmt->execute();
?>
<head>
	<?php 
	include './_share/client_assets.php';
	 ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	<title>Chi Tiết Sản Phẩm</title>
</head>

 <style type="text/css">
#tt{
		overflow: scroll;
    	height: 250px;
		}	
#cm{
    overflow: scroll;
    max-height: 210px; 
    margin-top: 30px; 
    margin-bottom: 50px;
    border: #ccc 1px solid;
    border-radius: 2px;
}
a{
		color: black;
}
.link i{
	margin-left: 10px;
}
.link a{
	color: #222;
}
.link a:hover{
	color: red;
}
.size-product img{
	width:100%;
}
.ct{
	height: 100px; 
	background: #fff; 
}
.ct h1{
	font-size: 48px;
	color: #343a40;
	font-weight: bold;
}
label{
	height: auto; background: #FFCCCC; color: black; border: 1px red solid; width: auto; margin-top: 10px;
	}
.nut a{
	color: #fff;
}
.nut a:hover{
	font-weight: bold;
	color: #fff;
	text-decoration:none;
}
.card-footer a{
	color: #fff
	}
</style>
<body>
	<?php 
	include './_share/header.php';
	 ?>
	  <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <div class="container-fluid" style="height: 200px; background: #ddd ">
        <div style="background: #ddd; height: 50px;"></div>
        <div class="container ct" style="background: #fff; height: 120px">
            <center><h1 style="font-weight: bold;">Thông tin sản phẩm</h1></center>
        </div>
    </div>
	<div id="product" style="background: #ddd;">
		<div class="container" style="background: #fff	">
			<div class="size-product">
				<?php foreach ($newProducts as $tt ): ?>
					<div class="col-md-6 left" style="margin-top: 12px;">
						<div class="anh"><center><img src="<?= $tt['image'] ?>"></center></div>
					</div>
					<div class="col-md-6 right" style="border: 2px solid #333; margin-top: 10px; border-radius:10px; color: #000; ">
						<div>
							<center><p style="font-size: 30; color: #343a40; font-style: italic;"><?= $tt['product_name'] ?></p></center>
						</div>
						<div>
							<b style="font-size: 25">Giá bán:  </b>
								<strike style="font-size: 25">
									<?= $tt['list_price'] ?> Đ
								</strike>
						</div>
						<div>
							<b style="font-size: 25">Giá khuyến mại: </b> 
							<span style="color: red; font-size: 25"><?= $tt['sell_price'] ?> Đ</span>
						</div>
						<div>
							<b style="font-size: 25">Mô tả:</b>
							<p  id="tt" style="font-size: 25"><?= $tt['detail'] ?></p>
						</div>
						<br>
						<div class="nut">	
							<form action="chitiet.php?id=<?=$tt['id']?>" method="post" >
								<button style="background: #333; border: 0; width: 200px; height: 60px; font-size: 20px;" name="btn_add"><a href="<?=$siteUrl?>save-cart.php?id=<?=$tt['id']?>">Thêm Vào Giỏ Hàng</a></button>		
							</form>			
						</div>
						<div id="dm" style="margin-top: 40px; margin-bottom: 20px;">
							<h3>Từ Khóa</h3><br>
							<div class="link"> 
								<i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=3?>"> Áo Các CLB</a>
								<i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=4?>">Áo Quốc Gia</a>
								<i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=5?>"> Áo Không logo</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div style="background: #ddd; height: 50px; "></div>
	<div id="hot-product" style="background: #ddd;">
		<div class="container" style="border-radius:15px; color: #000; background: #fff;  border: 1px solid #3333">
			<div class="row">
				<div class="col-md-6">
					<h2 style="margin-left: 30px;">Phản hồi</h2>
					<form action="submit_comment.php" method="post" id="vali">
						<input type="hidden" name="id" value="<?= $id?>">
						<input type="hidden" name="cate" value="<?= $cate?>">
						<div class="form-group">
							<b style="color: #000">Email</b>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<b style="color: #000"3>Nội dung</b>
							<textarea class="form-control" rows="5" name="content" required></textarea>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-sm btn-primary" style="width: 300px; height: 50px; font-size: 15px;">Gửi phản hồi</button>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<center><h2>Các phản hồi trước</h2></center>
					<div id="cm">
						<?php foreach ($comments as $c): ?>
						<div style="width: 100%; height: auto;">
							<div style="border: 1px solid black; background:MintCream ; width:100%; float: left;  height: auto; margin-bottom:20px">
								<b style="font-size: 20; margin-left: 5PX;"><?= $c['email']?></b>:
								<span style="font-size: 20; margin-left: 5PX;"> <?= $c['content']?></span>
							</div>
						</div>		
						<?php endforeach ?>
				</div>	
				</div>
			</div>
		</div>
	</div>
<div style="background: #ddd; height: 50px; "></div>
<!-- sản phẩm liên quan -->
	
	<div class="container-fluid" style="background: #ddd">
		<div class="container ct" style="background: #fff; height: 80px">
            <h2 style="font-weight: bold;">Sản Phẩm Liên Quan</h2>
        </div>
        <div class="container" style="height: auto; background: #fff; margin-top: 50px">
        	<div class="row" style="margin-top: 10px">
          <?php foreach ($cateP as $c): ?>
        <div class="col-lg-3 col-sm-2 portfolio-item" style="text-align: center;">
                <div class="link">
                  <a href="<?= $siteUrl?>chitiet.php?id=<?=$c['id']?>&&cate=<?=$c['cate_id']?>"><img class="card-img-top" src="<?=$c['image']  ?>" alt="" height="230px"></a>
                  <div>
                  <h4>
                    <a href="<?= $siteUrl?>chitiet.php?id=<?=$c['id']?>&&cate=<?=$c['cate_id']?>"><?=$c['product_name']?></a>
                  </h4>
                  <h5>Giá bán: <?=$c['list_price']?>đ</h5>
                  <h4>Giá khuyến mại: <?=$c['sell_price']?>đ</h4>
                </div>
            <div class="card-footer">
               <center>
               		<a href="<?=$siteUrl?>save-cart.php?id=<?=$c['id']?>" class="btn btn-primary bg-dark">Mua Hàng</a>&nbsp&nbsp
               		<a href="<?= $siteUrl?>chitiet.php?id=<?=$c['id']?>&&cate=<?=$c['cate_id']?>" class="btn btn-primary bg-dark">Chi Tiết</a>	
               </center>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
        </div>
    </div>


       <?php 
         include './_share/brand.php';
       ?>
  </div><br>
	<?php 
	 include './_share/footer.php';
	 ?>
</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
	$("#vali").validate({
            rules: {
                email: {
                    required: true,
                },
                content: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                email:{
                    required: "Vui lòng nhập email",
                   	minlength: "Vui lòng nhập đúng định dạng email",
                },	
                content: {
                    required: "Vui lòng nhập nội dung",
                    minlength: "Nội dung quá ngắn"
                }
            }
        });
</script>
</html>
<!-- Giỏ hàng -->
<script type="text/javascript">
	function ThemVaoGioHang() {
		var id= "<%=id%>"
	}
</script>