<?php  
include("koneksi.php");

$id = $_GET['id'];
mysqli_query($mysql, "UPDATE tb_order SET status = 'Pesanan Dibatalkan' WHERE id = $id  ");
header("location:pesanan.php");
?>