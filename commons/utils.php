<?php 
// Database config
$host = "127.0.0.1";
$dbname = "sportshop";
$dbusername ="root";
$dbpwd = "";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
	$dbusername, $dbpwd);

// website base url
$siteUrl = 'http://localhost/SportShop/';
$adminUrl = 'http://localhost/SportShop/admin/';
$adminAssetUrl = 'http://localhost/SportShop/admin/adminlte/';

define('TABLE_CATEGORY', 'categories');
define('TABLE_SLIDESHOW', 'slideshow');
define('TABLE_PRODUCT', 'products');
define('TABLE_WEBSETTING', 'web_settings');
define('TABLE_COMMENT', 'comments');
define('TABLE_BRANDS', 'brands');
define('TABLE_USERS', 'users');
define('TABLE_CONTACT', 'contact');
define('TABLE_DONHANG', 'donhang');

const USER_ROLES = [
	'admin' => 500,
	'moderator' => 300,
	'member' => 1
];

function dd($var)
{
	echo "<pre>";
	var_dump($var);
	die;
}
function checkLogin($role = 300){
	global $siteUrl;
	if(!isset($_SESSION['login']) 
		|| $_SESSION['login'] == null
		|| $_SESSION['login']['role'] < $role){
	  header('location: '.$siteUrl . 'login.php');
	  die;
	}
} 
 ?>