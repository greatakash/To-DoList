<?php
include "lib/connect.php"; 
 if(isset($_REQUEST['cat_sub']) == "cat_sub"){
 $cat = $_REQUEST['new_cat'];
 $insertcat = "insert into ".TABLE_PREFIX."categ set cat_name='".$cat."',
												  status='Yes'";
mysql_query($insertcat);
$_SESSION["cat_eve"] = "New category added" ;
header("location:index.php?cat=added") ;
 }
?>