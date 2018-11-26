<?php 
 include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký</title>
</head>
<body>
  <div class="header" style="background: #333">
    <a href="http://localhost/shophung/index.php">
         <img src="../img/LOGO.png" width="100%">
    </a>
  	<h2>Đăng ký Khách hàng</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button  type="submit" class="btn" name="reg_user">Đăng ký</button>
  	</div>
    <div class="aa">
      <p>
       Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a><button style="margin-left: 20px;width: 70px; height: 25px; background: #3333"><a  href="http://localhost/sportshop/index.php">Back</a></button>
      </p>

    </div>
  </form>
</body>
</html>
<style type="text/css">
  *{margin: 0px;
  padding: 0px;
}
.aa button a{
  color: black;
  text-decoration: none;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}
  a {
  color: black; 
}
.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #333;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
</style>