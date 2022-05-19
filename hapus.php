<?php  
include("koneksi.php");

$pid = $_GET['pid'];
mysqli_query($mysql, "DELETE FROM tb_product WHERE pid = $pid");
header("location:adminpage.php");
?>