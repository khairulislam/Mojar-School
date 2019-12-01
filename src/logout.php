<?php 
session_unset();
session_start();
$_SESSION=array();
header('Location: home.php');
?>
