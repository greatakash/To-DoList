<?php
//error_reporting(0);
session_start();
ob_start();
define('PROJECT_NAME', '05052016');
define('ALIAS', 'Commutus');
define('FAVICON', 'images/favicon.png');
define('TABLE_PREFIX', 'ct_');

define('REELPAGES_SEO_PREFIX','Commutus');

//date_default_timezone_set('Asia/Kolkata');

if($_SERVER['HTTP_HOST']=='192.168.1.102' || $_SERVER['HTTP_HOST']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost')
{
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASS', '');
define('DB_NAME', 'commutus');

$title = "To-Do | Commutus";
$siteurl = "http://localhost/05052016";
$site_login_url = "http://localhost/05052016/login.php";
$siteurladmin = "http://localhost/05052016/admin/";
$siteimg = "http://localhost/05052016/images";
}


$con = mysql_connect(DB_HOST,DB_USERNAME,DB_PASS) or die("Database connection error");
$db = mysql_select_db(DB_NAME,$con) or die("Database connection error");

/* ----------------------functions---------
you can send table-name and where condition to this function same as eg.
select(table_name,' And id = 1') */
function select($table,$where){
//echo $table ;
if($where == '' || $where == null){
$where = null ;}
 $select = "select * from ".TABLE_PREFIX.$table." where 1=1 ".$where."" ;
$result = mysql_query($select);
return $result ;
}






















?>