<?php  
	include("koneksi.php");
	if (isset($_GET['id'])) {
	 	$id = $_GET['id'];
	 }
 $item = mysqli_query($mysql, "SELECT * FROM tb_order WHERE id =$id");
		

?>
<!DOCTYPE html>
<html lang="en">
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
    <style type="text/css">
      .fpt-img {
  height: 400px;
  width: 400px;
  padding: 50px 0 0 50px;
  object-fit: contain;
}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  </head>
  <body>
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

    <main>
<?php
	while ($prod = mysqli_fetch_array($item)) {
			$surdok = "surat_dokter/" . $prod['surat_dokter'];
    		$nprod = $prod['nprod'];
    		$penerima = $prod['penerima'];
    		$tanggal = $prod['tanggal'];
?>
 <?php
      echo "
      <div class='product-header'>
        <div class='wrapper'>
          <div class='breadcrumb'>
          </div>
          <h1>Surat Dokter $penerima</h1>
        </div>
      </div>

      <div class='product-body'>
        <div class='wrapper'>
          <div class='product-body-grid'>
            <div class='fpt-img'><a href='$surdok' target='_blank'><img class='product-photo' src='$surdok'></a></div>

            <div class='product-details'>
              <div class='product-controls'>
                <div class='product-update-btn'>
                </div>
                <a href='konfirmasi.php'><button class='btn btn-main'>Kembali</button></a>
              </div>

              <div class='product-description'>
                <div class='product-description'>
                 <h5>Pemesan</h5>
                <div class='product-full-desc'>
                  <p>$penerima</p>
                </div>
                <h5>Produk Yang Dibeli</h5>
                <div class='product-full-desc'>
                  <p>$nprod</p>
                </div>
                  <h5>Tanggal Pesan</h5>
                <div class='product-full-desc'>
                  <p>$tanggal</p>
                </div>

                ";}?>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>