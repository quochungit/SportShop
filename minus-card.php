<?php 
session_start();
require_once './commons/utils.php';
$id = $_GET['id'];
// kiem tra xem id sp nay co trong phan products hay khong ?
$sql="select*from " . TABLE_PRODUCT;
$stmt=$conn->prepare($sql);
$stmt->execute();
$product=$stmt->fetchAll();

$item = false;
foreach ($product as $pro) {
	if($id == $pro['id']){
		$item = $pro;
		break;
	}
}

$cart = isset($_SESSION['CART']) == true ? $_SESSION['CART'] : [];
if(count($cart) == 0){
	// 1. khong ton tai gio hang/gio hang rong
	// ==> tang quantity cua item => 1 
	// => luu vao trong gio hang
	$item['quantity'] = 1;
	array_push($cart, $item);
}else{
	// 2. co gio hang
	$flag = -1;
	for ($i=0; $i < count($cart); $i++) {
		if($item['id'] == $cart[$i]['id']){
			$flag = $i;
			break;
		}
	}

	// flag == -1 ==> sp k co trong gio hang
	if($flag == -1){
		$item['quantity'] = 1;
		array_push($cart, $item);
	}else{
		// flag != -1 ==> sp co trong gio hang
		;
		$qty = $cart[$flag]['quantity'] - 1;
		if ($qty < 1) {
			header('location:gh.php ');
			die;
		} else{
			$cart[$flag]['quantity'] = $qty;

		}
	}
}

$_SESSION['CART'] = $cart;
header('location:gh.php ');


 ?>