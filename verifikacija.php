<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

include("init.php");
$id =$_GET['id'];
$db->rawQuery('update user set verifikovano=1 where id='.$id);
echo('Uspesno verifikovan korisnik');

 ?>
