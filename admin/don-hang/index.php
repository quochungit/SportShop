<?php 
// hien thi danh sach phan hoi cua he thong
session_start();
$path = "../";
require_once $path.$path."commons/utils.php";
checkLogin(USER_ROLES['moderator']);
$sql=" SELECT * FROM `donhang`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$donhang = $stmt->fetchAll();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SportShop| Đơn Hàng Khách Hàng</title>

  <?php include_once $path.'_share/top_asset.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once $path.'_share/header.php'; ?> 

  <?php include_once $path.'_share/sidebar.php'; ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Đơn Hàng Khách Hàng</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Đơn Hàng</li>
      </ol>
    </section>
      <style >
          .img img{
              width: 220px; height: 300px;}
      </style>
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-xs-12">
          <div class="box">
              <div class="box-body">
                <table class="table table-bordered bo" > 
                  <body>
                  <tr class="bo">
                    <th >Email</th>
                    <th >Tên khác hàng</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Địa chỉ</th>
<!--                     <th>Ngày mua</th> -->
                    <th>Tổng Giá</th>
                    <th >Khác</th>
                  </tr>
                  <?php foreach ($donhang as $p ): ?>
                    <tr>
                      <td><?= $p['email']?></td>
                      <td><?= $p['tenkh']?></td>
                      <td><?= $p['email']?></td>
                      <td><?= $p['sdt']?></td>
                      <td><?= $p['diachi']?></td>
<!--                       <td><?= $p['date']?></td> -->
                      <td><?= $p['tonggia']?></td>
                       <td>
                        <a class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i> Xem
                        </a>
                        <a href="javascript:;"
                          linkurl="<?= $adminUrl?>don-hang/remove.php?id=<?= $p['id']?>"
                          class="btn btn-xs btn-danger btn-remove">
                            <i class="fa fa-trash"></i> Xoá
                        </a>
                      </td>   
                    </tr>
                  <?php endforeach ?>
                </body>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <div class="paginate light-theme simple-pagination"></div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

  </div>
      <?php include_once $path.'_share/footer.php'; ?>
  <!-- /.content-wrapper -->
  <?php include_once $path.'_share/sidebar.php'; ?>  

</div>
<!-- ./wrapper -->
<?php include_once $path.'_share/bottom_asset.php'; ?>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  <?php 
  if(isset($_GET['success']) && $_GET['success'] == 'true'){
    ?>
    swal('Thêm đơn hàng thành công!');
  <?php
  }
   ?>
  $('.btn-remove').on('click', function(){
    var removeUrl = $(this).attr('linkurl');
    // var conf = confirm('Bạn có chắc chắn muốn xoá danh mục này không?');
    // if(conf){
    //  window.location.href = removeUrl;
    // }
    swal({
      title: "Cảnh báo",
      text: "Bạn có chắc chắn muốn xoá đơn hàng này không?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = removeUrl;
      } 
    });
  });
</script>
<script src="<?= $siteUrl?>plugins/simplePagination/jquery.simplePagination.js" type="text/javascript"></script>
 <script type="text/javascript">
     var pageUrl = '<?= $adminUrl. "phan-hoi/index.php?"?>'; 
    $('.paginate').pagination({
          items: <?= $countcomment['total_product']?>,
          currentPage: <?= $pageNumber?>, 
          itemsOnPage: <?= $pageSize?>,
          cssStyle: 'light-theme',
          onPageClick: function(val){
            window.location.href = pageUrl+`page=${val}`;
          }
      }); 
   </script> 
</body>
</html>