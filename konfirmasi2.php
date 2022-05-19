<?php  
include("koneksi.php");

$id = $_GET['id'];
$status=$_GET['status'];
$qty = $_GET['qty'];
$nprod=$_GET['nprod'];
$item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE name_product = '$nprod'");
	while ($prod = mysqli_fetch_array($item)) {
    		$jmlh = $prod['stock'];
		}


if ($status == 'ditolak') {
	mysqli_query($mysql, "UPDATE tb_order SET status = 'Pesanan Ditolak' WHERE id = $id  ");
header("location:konfirmasi.php");
}elseif ($status == 'diterima') {
	mysqli_query($mysql, "UPDATE tb_order SET status = 'Pesanan Sedang Disiapkan' WHERE id = $id  ");
header("location:konfirmasi.php");
}elseif ($status == 'kirim') {
	mysqli_query($mysql, "UPDATE tb_order SET status = 'Pesanan Sedang Dikirim' WHERE id = $id  ");
header("location:kpesanan.php");
}elseif ($status == 'sampai') {
$stock = $jmlh - $qty;
	mysqli_query($mysql, "UPDATE tb_order SET status = 'Pesanan Sudah Diterima' WHERE id = $id  ");
	mysqli_query($mysql, "UPDATE tb_product SET stock = $stock WHERE name_product = '$nprod'");
header("location:kpesanan.php");
}

?>