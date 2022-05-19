
<?php
	if (isset($_GET['pid'])) {
	 	$pid = $_GET['pid'];
	 } 
include("koneksi.php");
	$table = mysqli_query($mysql, "SELECT * FROM tb_product WHERE pid = $pid");
	while ($prod = mysqli_fetch_array($table)) {
		$pid=$prod['pid'];
		$produk=$prod['name_product'];
		$stock=$prod['stock'];
		$kategori=$prod['categories'];
		$harga=$prod['price'];
		$deskripsi=$prod['deskripsi'];
		$foto_produk=$prod['foto_produk'];
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
          <h1>Edit Produk</h1>
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
                <h5>Update</h5>
                <div class='product-full-desc'>
                  <select class="form-control" name="fprod">
					<option value="img">Dengan Foto</option>
					<option value="noimg">Tanpa Foto</option>
				</select>
                </div>
                <h5>Produk <span style="opacity: 0.5;">(Sebelumnya : <?php echo $produk;?>)</span></h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="text" name="name_product" placeholder="Produk" >
                  <br>
                </div>
                <h5>Stok <span style="opacity: 0.5;">(Sebelumnya : <?php echo $stock;?>)</span></h5>
                <div class='product-full-desc'>
                	<input class="form-control" type="number" name="stock" placeholder="stock" >
                	
                </div>
                <h5>Kategori  <span style="opacity: 0.5;">(Sebelumnya : <?php echo $kategori;?>)</span></h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="text" name="categories" placeholder="Kategori" >
                  </div>
                <h5>Harga <span style="opacity: 0.5;">(Sebelumnya : RP.<?php echo $harga;?>)</span></h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="number" name="price" placeholder="Harga" >
                  
                </div>
                <h5>Deskripsi <span style="opacity: 0.5;">(Sebelumnya : <?php echo $deskripsi;?>)</span></h5>
                <div class='product-full-desc'>
                  <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="max-width: 500px;"></textarea>
                  
                </div>
                <h5>Foto Produk <span style="opacity: 0.5;">(Sebelumnya : <?php echo $foto_produk;?>)</span></h5>
                <div class='product-full-desc'>
                  <input class="form-control" type="file" name="foto_produk" id="foto_produk">
                  
                </div>
                <h5><input type="hidden" name="pid" value=<?php echo $pid;?>></h5>
                <div class='product-full-desc'>
                  <input class='btn btn-main' type="submit" name="update" value="Update">
                </div>
	</form>
</body>
</html>
<?php  
if (isset($_POST['update'])) {
	
	$pid=$_POST['pid'];
	$produk=$_POST['name_product'];
	$stock=$_POST['stock'];
	$kategori= $_POST['categories'];
	$harga= $_POST['price'];
	$deskripsi= $_POST['deskripsi'];
if ($_POST['fprod'] == "img") {
	$foto_produk = basename($_FILES["foto_produk"]["name"]);
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
	}
	}elseif ($_POST['fprod'] == "noimg") {
		$foto_produk = $foto_produk;
		$uploadOk = 1;
	}

if ($uploadOk == 0) {
		header("Location: edit.php?pid=$pid&&edit=gagal");
	}
	
	
	elseif ($uploadOk == 1) {
		include("koneksi.php");
		if ($_POST['fprod'] == "img") {
			$update = mysqli_query($mysql, "UPDATE tb_product SET pid=$pid, name_product='$produk', stock=$stock, categories='$kategori', price=$harga,deskripsi='$deskripsi', foto_produk = '$foto_produk' WHERE pid=$pid");
			header("Location: adminpage.php");
		}elseif ($_POST['fprod'] == "noimg") {
			$update = mysqli_query($mysql, "UPDATE tb_product SET pid=$pid, name_product='$produk', stock=$stock, categories='$kategori', price=$harga,deskripsi='$deskripsi' WHERE pid=$pid");
			header("Location: adminpage.php");
		}

		}
	}
?>
