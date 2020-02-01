<?php

require('db.php');
$db = new MysqliDb('localhost','root','','fuca');

session_start();

if(!isset($_SESSION['user'])){

  $_SESSION['user'] = array();
}



?>
