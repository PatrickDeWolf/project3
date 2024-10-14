<?php

$testConnectie=0;

$host="";
$logincon="";
$password="";
$database="";


if($_SERVER['SERVER_NAME']=="localhost")
{
   $host="";
   $logincon="root";
   $password="";
   $database="users";
}


$con = mysqli_connect($host,$logincon,$password,$database);
if (mysqli_connect_error())
{
   echo"Systeem probleem, probeer het later opnieuw";
}else{
   if($testConnectie==1){echo"Verbinding werkt!";}
}
?>