<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập thành công</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div style="width: 500px; height: 300px; margin: auto; background: #999 ;border: 3px #333 solid; margin-top: 100px; position: relative;">
  
  <center><img style="margin-top:10px" src="../img/LOGO.png" width="90%"></center>
  <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <h1 style="position: absolute; top: 120px; left: 90px; color: #fff">Đăng nhập thành công</h1>
      <p style="text-align: center; margin-top: 70px; font-size: 20px; color: white;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <div class="aaa" style="text-align: center;">
         <p>
              <button style="width: 100px; height: 40px; background: #FF3333; border: 0px;"><a href="http://localhost/sportshop?logout='1'";">Đăng xuất</a></button> 
              <button style="width: 100px; height: 40px; background: #FF3333; border: 0px;"><a href="http://localhost/sportshop/">Đến trang chủ</a></button>
         </p>
      </div>
     <style type="text/css">
       .aaa button a{
        color: #000;
        text-decoration: none;
       }
        .aaa button a:hover{
          color: #fff;
        }
     </style>
    <?php endif ?>
</div>
</body>
</html>