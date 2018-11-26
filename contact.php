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
$newBrandsQuery = "	select * 
						from ".TABLE_BRANDS." 
						order by id desc limit 4
						";
$stmt = $conn->prepare($newBrandsQuery);
$stmt->execute();

$newBrands = $stmt->fetchAll();

$sql = "select * from " . TABLE_WEBSETTING;
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetch();

 ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Liên Hệ</title>
</head>
<body>
 	 <?php 
   		 include './_share/client_assets.php';
     ?>
     <?php 
    include './_share/header.php';
     ?>
     <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
<div id="content" style="background: #ddd;">
    <div style="background: #ddd; height: 50px"></div>
	<div class="container" style="background: #fff; height: auto;">
		<div class="col-md-6 left">
            <div style="background: #eee; border: 1px blue solid; height: 50px; margin-top: 10px; position: relative;">
                  <h2 style="position: absolute;left: 10px ; bottom: -1px;" class="title-product">Liện hệ với chúng tôi</h2>               
            </div><br>  
			<form action="submit_contact.php" method="post" id="vali">
				<div>
					<b>Tên khách hàng</b>
					<input  type="text" class="form-control" name="name" required>
				</div>
				<div>
					<b>Email</b>
					<input type="email" class="form-control" name="email" required>
				</div>
				<div>
					<b>Số điện thoại</b>
					<input type="tel" class="form-control" name="phone" required>
				</div>
				 <div>
                    <b>Nội Dung</b>
                    <textarea style="height: 180px" class="form-control" name="nd" required></textarea>
                </div>
				<br>
				<button type="submit" value="upload" style="width: 200px; height: 50px; font-size: 25px; background: #66FFCC; color: #C0c">Gửi</button>
				<button style="width: 70px; height: 50px;background: #66FFCC; font-size: 25px"><a href="index.php">Back</a></button>
			</form>
			<style type="text/css">
				button a{color:#C0c }
				label{
					height: auto; background: #FFCCCC; color: black; border: 1px red solid; width: auto; margin-top: 10px;
					}
       .link a{
              float: right;
              margin-right: 10px
            }
			</style>
		</div>
		<div class="col-md-6 right">
                <div style="background: #eee; border: 1px blue solid; height: 50px; margin-top: 10px; position: relative;">
                  <h2 style="position: absolute;left: 10px ; bottom: -1px;" class="title-product">Địa chỉ của chúng tôi</h2>               
                </div> 
                <div style="margin-top: 30px;">
                    <?= $data['map']?>
                </div>
        </div>
	</div>
</div>
    <?php 
        include './_share/brand.php';
    ?> 

 <?php 
    include './_share/footer.php';
     ?>
</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
	$("#vali").validate({
            rules: {
            	phone:{
                    required: true,
                    minlength: 10
                },
                name: "required",
                email: {
                    required: true,
                    minlength: 1
                },
                nd: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
            	phone: {
                            required: "Vui lòng nhập số điện thoại",
                            minlength: "Mời nhập SĐT, ít nhất 10 chữ số"
                        },
                name: "Vui lòng nhập tên",
                email:{
                    required: "Vui lòng nhập email",
                   
                },	
                nd: {
                    required: "Vui lòng nhập ghi chú của bạn",
                    minlength: "Nội dung ngắn vậy?"
                }
            }
        });
</script>
</html>