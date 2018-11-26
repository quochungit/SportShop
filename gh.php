<?php 
session_start();

$cart = isset($_SESSION['CART']) == true ? $_SESSION['CART'] : [];
$totalPrice = 0;

require_once './commons/utils.php';
 ?>
<!DOCTYPE html>
<html> 
<head>
  <title>Giỏ Hàng Của Bạn</title>
</head>
<?php 
  include './_share/client_assets.php';
   ?>
   <?php 
  include './_share/header.php';
   ?>
   <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
<div style="height: 80px; background: #ddd"></div>
 <div class="container-fluid" style=" background: #ddd">
  <div class="container" style="background: #fff">
   <table border="1" style="width: 100%; text-align: center; ">
    <thead>
      <td colspan="6"><h1 style="font-weight: bold;">Giỏ Hàng Của Bạn</h1></td>
      <tr class="table-row" style="height: 30px">
        <th class="column-1 " style="text-align: center;">Tên Sản Phẩm</th>
        <th class="column-2" style="text-align: center;">Ảnh Sản Phẩm</th>
        <th class="column-3 p-l-70 " style="text-align: center;">Số lượng</th>
        <th class="column-4 " style="text-align: center;">Giá/1sp</th>
        <th class="column-5 " style="text-align: center;">Giá mua</th>
        <th class="column-6 " style="text-align: center;">Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cart as $np): ?>
        <tr  class="table-row">
          <td class="column-1"><?= $np['product_name'] ?></td>
          <td class="column-2">
            <img src="<?= $np['image'] ?>" width="200">
          </td class="column-3">
          <td class="column-4">
            <a href="minus-card.php?id=<?=$np['id']?>">-</a>
            <input style="width: 50px" value="<?= $np['quantity'] ?>" min="1">
            <a href="plus-card.php?id=<?=$np['id']?>">+</a>
          </td>
          <td class="column-5"><?= $np['sell_price'] ?> Đ</td>
          <td class="column-6"><?= $np['sell_price']*$np['quantity'] ?> Đ</td>
          <td class="column-7">
                <button style="width: 80px; height: 30px">
                    <a href="remove-cart.php?id=<?=$np['id']?>">Xóa</a>
                </button>
          </td>
        </tr>
          <?php 
            $Price = $np['sell_price']*$np['quantity'];
            $totalPrice += $np['sell_price']*$np['quantity'];
            $product_id = $np['id'];  
          ?> 
      <?php endforeach ?>
      <tr>
        <td class="product-line-price" colspan="6" style="height: 40px;">Tổng số tiền: <?= $totalPrice ?> Đ</td>
      </tr>
    </tbody>
 </table>
 </div>
 </div> 
 <div class="container-fluid">
  <div style="height: 90px; background: #ddd;"></div>
  <div class="container-fluid" style="background: #ddd">
    <div class="container" style="background: #fff">
    <center><h1 style="font-weight: bold; margin-left: 80px;">Hoàn Tất Thanh Toán</h1></center>
    <div class="col-md-6">
      <form method="post" action="submit_cart.php" id="vali">
        <b>Tên khách hàng</b> 
        <input class="form-control" type="text" name="tenkh" required><br>
        <b>Email</b> 
        <input  class="form-control" type="text" name="email" required><br>
        <b>Số điện thoại</b> 
        <input class="form-control" type="text" name="sdt" required><br>
        <b>Địa chỉ nhận hàng</b> 
        <textarea class="form-control" rows="5" name="diachi" required></textarea><br>
        <b>Ghi chú</b> 
        <textarea class="form-control" rows="5" name="ghichu" required></textarea><br>
        <?php foreach ($cart as $np): ?>
            <input type="hidden" name="tonggia" value="<?= $totalPrice ?>">
         <?php endforeach ?>
        <input style="height: 50px; width: 123px; background: #555; color: #fff" type="submit" name="btn_gui" value="THANH TOÁN">
      </form>
    </div>
    <div class="col-md-6" style="float: right;  height: 600px; font-family: initial;">
        <center><img style="margin-top: 20px" src="img/gh.png" width="80%"></center>
        <div style="margin-top: 30px;  margin-left: 50px">
            <p style="font-size: 20px"><span style="color: red;">* </span>Giao hàng tận nơi và miễn phí</p>
            <p style="font-size: 20px"><span style="color: red;">* </span>Đăng ký để nhận mã giảm giá</p>
            <p style="font-size: 15px; text-align: justify;">Mua hàng trực tuyến mang lại sự tiện lợi, chủ động, lựa chọn đa dạng, với các dịch vụ hỗ trợ mua hàng, bán hàng, thanh toán an toàn, giao hàng chuyên nghiệp. Với phương châm “Mong 1 người đến vạn lần, hơn vạn người đến 1 lần”, <span style="font-weight: bold;">sportshop.com</span> không ngừng nỗ lực, cải tiến đáp ứng nhu cầu mua giày đá bóng của khách hàng.
            <span style="font-weight: bold;">sportshop.com</span> đảm bảo sẽ cung cấp sản phẩm chân thực so với mô tả ở trên Website.</p>
        </div>
    </div>
  </div>
  </div>
 </div>
      <?php 
         include './_share/brand.php';
    ?>
    <div style="height: 30px"></div>
    <?php 
     include './_share/footer.php';
     ?>

</html>
<style type="text/css">
  .column-7 button{
    background: #333;
  }
  .column-7 button:hover{
    border: 1px solid black;
  }
  .column-7 button a{
    color: white;
  }
  .column-7 button a:hover{
    color: red;
    text-decoration: none;
  }
    label{
          height: auto; background: #FFCCCC; color: black; border: 1px red solid; width: auto; margin-top: 10px;

          } 
</style>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
  $("#vali").validate({
            rules: {
              sdt:{
                    required: true,
                    minlength: 10
                },
                tenkh: "required",
                email: {
                    required: true,
                    minlength: 1
                },
                ghicu: {
                    required: true,
                    minlength: 2
                },
                diachi: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
              sdt: {
                            required: "Vui lòng nhập số điện thoại",
                            minlength: "Mời nhập SĐT, ít nhất 10 chữ số"
                        },
                tenkh: "Vui lòng nhập tên",
                email:{
                    required: "Vui lòng nhập email",
                   
                },  
                ghichu: {
                    required: "Vui lòng nhập nội dung",
                    minlength: "Nội dung ngắn vậy?"
                },
                diachi: {
                    required: "Vui lòng nhập địa chỉ",
                    minlength: "Nội dung ngắn vậy?"
                }
            }
        });
</script>