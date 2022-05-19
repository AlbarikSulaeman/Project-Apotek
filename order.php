<?php  
session_start();
		$logout_auto =24 * 60 * 60;
		$log_auto=time();

		if (isset($_SESSION['start_time'])) {
			$waktu_out = time() - $_SESSION['start_time'];
			if($waktu_out >= $logout_auto){
				session_destroy();
 				session_unset();
				header('Location: login.php');
			}
		}$_SESSION['start_time'] = time();

		 if($_SESSION['login'] == false){
			header('Location: login.php');
			 }														
		 elseif ($_SESSION['login'] == true) {
			$uid = $_SESSION['uid'];
 }
include("koneksi.php");
if (isset($_GET['pid'])) {
	 	$pid = $_GET['pid'];
	 } 
$table = mysqli_query($mysql, "SELECT * FROM tb_product WHERE pid = $pid");
while ($prod = mysqli_fetch_array($table)) {
		$pid=$prod['pid'];
		$produk=$prod['name_product'];
		$stock=$prod['stock'];
		$kategori=$prod['categories'];
		$harga=$prod['price'];
	}
$user_table = mysqli_query($mysql, "SELECT * FROM tb_user WHERE uid = '$uid'");
	if(mysqli_num_rows($user_table) != 0){
	$row = mysqli_fetch_assoc($user_table);
		$user = $row['username'];
		$alamat = $row['alamat'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum=1" />
    <title>Apotek 13</title>
    <link rel="stylesheet" href="mystyle.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  </head>
  <body style="background-image: url(img/hero.jpg);background-size: cover;background-repeat: no-repeat;">
<input type="checkbox" id="toggle-nav" />
    <div class="mobile-nav">
      <div class="mobile-nav-header">
        <span>Menu</span>
        <div class="close-btn">
          <label for="toggle-nav">
            <i class="fas fa-times"></i>
          </label>
        </div>
      </div>

      <div class="mobile-nav-menu">
        <ul>
          <li>
            <a href="">Daftar</a>
          </li>
        </ul>
      </div>
    </div>

    <header>
      <nav>
        <div class="top-header">
          <small>
            Apotek 13<br />
            beli obat dari rumah
          </small>
        </div>

        <div class="bot-header">
          <div class="brand">
            <img src="img/pharmacy.svg" width="30px" alt="" />
            <h5>Apotek 13</h5>
          </div>
          <label for="toggle-nav">
            <i class="fas fa-list"></i>
          </label>
        </div>
      </nav>
    </header>
	
      <div class='product-header'>
        <div class='wrapper'>
          <div class='breadcrumb'>
          </div>
          <h1>Silahkan Masukan Pesanan Anda</h1>
        </div>
      </div>

      <div class='product-body'>
        <div class='wrapper'>
          <div class='product-body-grid'>

            <div class='product-details'>
              <div class='product-controls'>
                <div class='product-update-btn'>
				</div> 
              </div>

              <div class='product-description'>
                <a href='userpage.php'><button class='btn btn-main'>Kembali</button></a>                           
<form method="post" enctype="multipart/form-data">
		<div class='product-description'>
                <h5>Jumlah Barang</h5>
                <div class='product-full-desc'>
                  <input  class="form-control"type="number" name="qty" required="required" max="<?php echo $stock ?>" placeholder="stock <?php echo $stock ?>" >
                  <br>
                </div>
                <h5>Alamat</h5>
                <div class='product-full-desc'>
                	<textarea class="form-control" name="alamat" placeholder="Harap Memberikan Alamat Secara Rinci" style="max-width: 500px"><?php echo $alamat; ?></textarea>              
                 </div>
                 <?php  
			if ($kategori == "Obat Keras") {
				$status = "Pengecekan Surat Dokter";
				echo "<h5>Surat Dokter</h5><div class='product-full-desc'> <input class='form-control' type='file' name='surat_dokter' id= 'surat_dokter' required='required'></div>";
			}else{
				$status = "Pesanan Sedang Disiapkan";
				echo "";
			}
		?>
                <h5>Pembayaran</h5>
                <div class='product-full-desc'>
                  <select class="form-control" name="pembayaran">
					<option value="ditempat">Bayar ditempat</option>
				</select>
                  </div>
                <h5><input type="hidden" name="id" readonly="readonly" value="<?php $id=mt_rand(10000000, 99999999); echo $id ?>"></h5>
                <div class='product-full-desc'>
                  <input class='btn btn-main' class="form-control" type="submit" name="pesan" value="Pesan">
                </div>
	</form>
<?php 
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['pesan'])) {
	$qty=$_POST['qty'];
	$id=$_POST['id'];
	$alamat=$_POST['alamat'];
	$total = $harga * $qty;
	$pembayaran = $_POST['pembayaran'];
	$nprod= $produk;
	$tanggal = date('d - m - y');
if ($kategori == "Obat Keras") {
	$surat_dokter = basename($_FILES["surat_dokter"]["name"]);
	$target_dir = 'surat_dokter/';
	$target_file = $target_dir . basename($_FILES["surat_dokter"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["surat_dokter"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    $kondisi = 1;
 	} else {
    echo "File harus berupa JPG, JPEG, & PNG file.";
    $uploadOk = 0;
    $kondisi = 0;
 	 }
if (@$kondisi == 1) {
if (file_exists($target_file)) {
 	 echo "Sorry, file already exists.";
 	 $uploadOk = 0;
	}
if (@$_FILES["surat_dokter"]["size"] > 5000000) {
 	 echo "Sorry, your file is too large.";
 	 $uploadOk = 0;
	}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	    echo "hanya bisa JPG, JPEG, & PNG file.";
	     $uploadOk = 0;
	}if ($uploadOk == 0) {
	  echo "Maaf, foto tidak bisa di upload";
	} else {
if (move_uploaded_file($_FILES["surat_dokter"]["tmp_name"], $target_file)) {
	    echo "produk ". htmlspecialchars( basename( $_FILES["surat_dokter"]["name"])). " berhasil ditambahkan";
	  } else {
	    echo "Maaf, terjadi error saat upload file";
	  }
	}
if ($uploadOk == 0) {
		 echo "";
	}
	elseif ($uploadOk == 1) {
		include("koneksi.php");
	$tambah=mysqli_query($mysql, "INSERT INTO tb_order VALUES($id,$qty,'$pembayaran', $total  ,'$alamat',$pid,'$user','$surat_dokter', '$nprod', '$tanggal', '$status','$uid')");
	header("Location: pesanan.php");
		}
	}
	}
	else{
		$surat_dokter=0;
		include("koneksi.php");
		$tambah=mysqli_query($mysql, "INSERT INTO tb_order VALUES($id,$qty,'$pembayaran' , $total,'$alamat',$pid,'$user','$surat_dokter', '$nprod', '$tanggal', '$status','$uid')");
		echo "anda telah berhasil memesan ". $nprod;
	header("Location: pesanan.php");
	}
	}
	
?>
</body>
</html>