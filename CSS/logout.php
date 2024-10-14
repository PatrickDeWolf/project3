<?php 
session_start(); 
session_destroy();
$backTo="index.php";
header('Location: '.$backTo);
?>


