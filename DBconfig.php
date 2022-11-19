<?php 
$HostName = "localhost";
$DatabaseName = "bao_cao_app";
$HostUser = "root";
$HostPass = "";
$connect= mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName) or die("Database erro");
mysqli_set_charset($connect,'utf8');
?>