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
$mostViewsQuery = " select * 
                        from ".TABLE_PRODUCT."  
                        order by views desc
                        limit 5";
$stmt = $conn->prepare($mostViewsQuery);
$stmt->execute();

$mostViewsProducts = $stmt->fetchAll();
 ?>

<html lang="en">
  <title>Giới thiệu- Sport Shop</title>
    <?php 
    include './_share/client_assets.php';
     ?>
    <!-- Header -->
    <?php 
     include './_share/header.php';
     ?>
     <!-- menu -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <div class="container-fuild" style="height: 80px; background: #eee"></div>
     <div class="container-fuild" style="height: auto; background: #ddd; ">
         <div class="container">
             <div class="row">
                 <div class="col-xl-8" style="background: #fff; height: auto;">
                     <h3>TRANG CHỦ SPORTSHOP - WEBSITE CUNG CẤP QUẦN ÁO BÓNG ĐÁ UY TÍN</h3>
                     <section>
                            <p>Chào mừng quý khách đến với SportShop.VN, website mua sắm trang phục thể thao online hàng đầu tại Việt Nam. SportShop.vn là website chuyên cung cấp các mặt hàng quần áo bóng đá và dịch vụ in ấn quần áo bóng đá.</p>
                            <img src="img/nd.jpg" width="100%"><br>
                    </section>
                    <section style="text-align: justify;">
                         <span  ><br>    SportShop là đơn vị kinh doanh trong lĩnh vực may mặc quần áo thể thao, chúng tôi chuyên sỉ lẻ quần áo bóng đá trên toàn quốc với nhiều mẫu mã đa dạng. Hiện nay, SportShop có cơ sở may tại Thành Phố Nam Định, với thế mạnh về nguồn nhân lực nhiều năm kinh nghiệm trong lĩnh lực may mặc quần áo thể thao, được phân phối trên toàn quốc. SportShop tự tin là nhà cung cấp quần áo thể thao với buôn sỉ tốt nhất trên thị trường hiện nay.</span> 
                    </section>
                    <section style="margin-top: 15px; text-align: justify;">
                        <center><img src="img/nd2.jpg" width="100%"></center>
                        <br><p>Trong lĩnh vực kinh doanh, việc lựa chọn cho mình nguồn hàng uy tín để kinh doanh lâu dài là một việc vô cùng quan trọng. Nó ảnh hưởng đến toàn bộ chiến lực kinh doanh và sự thành công của bạn sau này. Do đó, bạn nên dành nhiều thời gian tìm kiếm các thông tin về xưởng may bỏ sỉ uy tín để hạn chế tối thiểu các rủi ro. Đồng thời, bạn cần phải rút kinh nghiệm qua những lần nhập hàng để hạn chế lượng hàng tồn kho, tránh tình trạng tồn đọng vốn, và ‘tăng’ số vòng thu hồi vốn.<br><br>
                        Thực chất nếu là người chưa có kinh nghiệm về chọn mua quần áo, bạn sẽ rất khó để tìm thấy lời khuyên đích thực, hay một địa chỉ tin cậy từ những người cũng đang có cùng mặt hàng kinh doanh giống mình, vì đó là “cần câu cơm” của họ nên chẳng ai dại mà đi chia sẻ với đối thủ của mình. Còn nếu bạn chân ướt chân ráo tìm đến những chợ đầu mối lớn sẽ rất dễ bị người ta hét với cái giá trên trời không thấp hơn so với việc mua lẻ là mấy. Chúng tôi nhà cung cấp trang phục thể thao hiện đang cung cấp hàng trăm mẫu quần áo bóng đá đến tất cả cửa hàng trên toàn quốc là lựa chọn uy tín dành cho bạn. Với mong muốn mang đến những sản phẩm may mặc hàng Việt Nam chất lượng và đặc biệt là lấy cảm hứng từ nhu cầu thực tế của người tiêu dùng Việt Nam, Bulbal cho ra những mẫu sản phẩm vừa độc đáo vừa phù hợp với xu hướng thời trang.
                        <br><br>Website mua bán quần áo thể thao online uy tín, chất lượng. Đặc biệt dịch vụ giao hàng hóa nhanh trong ngày. Shop giao hàng và thu tiền tận nơi trên toàn quốc, hỗ trợ đổi trả miễn phí trong 7 ngày. <br><br>
                        <img <img src="img/HT.png" width="100%">
                        <br><br>
                        Nếu bạn đang quan tâm đến những mẫu quần áo thể thao để nhập về bán sỉ hoặc bán lẻ vui lòng liên hệ với chúng tôi để nhận được tư vấn về chính sách phân phối hấp dẫn dành cho các Đại Lý - Cộng tác viên và chọn mẫu ưng ý, dễ bán.
                        </p><br>
                    </section>
                    <div style="margin-top: 20px; margin-bottom: 20px;">
                            <h3>Từ Khóa</h3><br>
                            <div class="link"> 
                                <i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=3?>"> Áo Các CLB</a>
                                <i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=4?>">Áo Quốc Gia</a>
                                <i class="fas fa-link"></i><a href="danhmuc.php?id=<?= $c['id']=5?>"> Áo Không logo</a>
                            </div>
                        </div>
                </div>
                 <div class="col-xl-4" style="background: #fff; height: auto;">
                     <center><h3>SẢN PHẨM MỚI</h3></center><br>
                      <?php foreach ($mostViewsProducts as $np): ?>
                    <div class="img-height img">
                        <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>"><img src="<?= $siteUrl . $np['image']?>" alt=""></a>
                        <div class="footer-product">
                            <a href="<?= $siteUrl?>chitiet.php?id=<?=$np['id']?>&&cate=<?=$np['cate_id']?>" class="details" class="details">Xem chi tiết</a>
                            <a href="<?=$siteUrl?>save-cart.php?id=<?=$np['id']?>" class="buying">Mua hàng</a>
                        </div>
                    </div>
                    <div id="namesp">
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
            <?php endforeach ?>
                 </div>
             </div>
         </div>
     </div>
    <style type="text/css">
        .img img{
            width: 100%;
        }
        .img-height{
             height: 330px;
            overflow: hidden;
            border: 1px solid #ccc;
            box-shadow: 20px;
            position: relative; 
            }
        .link a{
            color: black;
        }
    </style>
     <?php 
         include './_share/brand.php';
    ?>
    <div style="height: 30px"></div>
    <?php 
     include './_share/footer.php';
     ?>