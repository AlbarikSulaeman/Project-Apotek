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
          <h1>Tambah Produk Baru</h1>
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
                <a href='adminpage.php'><button class='btn btn-main'>Kembali</button></a>                           
<form method="post" action="add.php" enctype="multipart/form-data">
               <div class='product-description'>
                <h5>PID</h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="number" name="pid" readonly="readonly" value="<?php $pid=mt_rand(100000, 999999); echo $pid ?>">
                </div>
                <h5>Produk</h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="text" name="produk" placeholder="Produk" required="required">
                </div>
                <h5>Stok</h5>
                <div class='product-full-desc'>
                	<input class="form-control" type="number" maxlength="5" name="stock" placeholder="Stock" required="required">
                </div>
                <h5>Kategori</h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="text" name="kategori" placeholder="Kategori" required="required">
                </div>
                <h5>Harga</h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="number" maxlength="10" name="harga" placeholder="Harga" required="required">                  
                </div>
                <h5>Deskripsi</h5>
                <div class='product-full-desc'>
                  <td><textarea class="form-control" name="deskripsi" style="max-width: 500px"></textarea></td>
                </div>
                <h5>Foto Produk</h5>
                <div class='product-full-desc'>
                  <input  class="form-control" type="file" name="foto_produk" id= "foto_produk" required="required">
                </div>
                <h5></h5>
                <div class='product-full-desc'>
                  <input class='btn btn-main' type="submit" name="submit" value="Tambah">
                </div>

	</form>

	<?php  
		if(isset($_POST['submit'])) {
			$pid=$_POST['pid'];
			$produk=$_POST['produk'];
			$stock=$_POST['stock'];
			$kategori= $_POST['kategori'];
			$harga= $_POST['harga'];
			$deskripsi = $_POST['deskripsi'];
			$foto_produk = basename( $_FILES["foto_produk"]["name"]);
			$target_dir = 'foto_produk/';
			$target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
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
		if (@$_FILES["foto_produk"]["size"] > 5000000) {
 		 echo "Sorry, your file is too large.";
 		 $uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		    echo "hanya bisa JPG, JPEG, & PNG file.";
		     $uploadOk = 0;
		}if ($uploadOk == 0) {
		  echo "Maaf, foto tidak bisa di upload";
		} else {
		  if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
		    echo "produk ". htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " berhasil ditambahkan";
		  } else {
		    echo "Maaf, terjadi error saat upload file";
		  }
		}
		if ($uploadOk == 0) {
			 header("Location: add.php?upload=gagal");;
		}
		elseif ($uploadOk == 1) {
			include("koneksi.php");
		$tambah=mysqli_query($mysql, "INSERT INTO tb_product VALUES($pid,'$produk', $stock ,'$kategori',$harga, '$deskripsi', '$foto_produk')");
		$tmbah2=mysqli_query($mysql, "INSERT INTO tb_penjualan VALUES($pid,'$produk', 0 , 0 , 0 , 0)");
		header("Location: adminpage.php");
		}
	}
	}
	?>
</body>
</html>