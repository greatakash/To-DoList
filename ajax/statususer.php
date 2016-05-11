<?php 
include "../lib/connect.php";

$id = $_REQUEST['id'];
$stat = $_REQUEST['stat'] == 'true' ? 'Yes' : 'No';	

$updatestat = "UPDATE ".TABLE_PREFIX."events SET status = '".$stat."' WHERE e_id = '".$id."'";
mysql_query($updatestat) or die(mysql_error());
?>