<?php  

session_start();
 
 if(@$_SESSION['login'] == true){
  $back = "userpage.php";
 }                              
 else{
  $back = "index.php";
 }
 include("koneksi.php");
  if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
   }

 $item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE pid =$pid");
    
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
      $fproduk = "foto_produk/" . $prod['foto_produk'];
      $nprod=$prod['name_product'];
      $deskripsi=$prod['deskripsi'];
      $kategori=$prod['categories'];
      $stok=$prod['stock'];
      $harga=$prod['price'];
      ?>
      <?php
      echo "
      <div class='product-header'>
        <div class='wrapper'>
          <div class='breadcrumb'>
          </div>

          <h1>$nprod (Stok = $stok)</h1>

          <h3>Rp.$harga</h3>

          <div class='share-btn'>
            <i class='fab fa-facebook'></i>
            <i class='fab fa-instagram'></i>
            <i class='fab fa-twitter'></i>
          </div>
        </div>
      </div>

      <div class='product-body'>
        <div class='wrapper'>
          <div class='product-body-grid'>
            <div class='product-photo'><img class='fpt-img' src='$fproduk'></div>

            <div class='product-details'>
              <div class='product-controls'>
                <div class='product-update-btn'>
                </div>
                <a href='$back'><button class='btn btn-main' style='background-color: red; border-color: red;'>Kembali</button></a>
               
              </div>

              <div class='product-description'> 
                <h5>Kategori</h5>

                <div class='product-full-desc'>
                  <p>$kategori</p>
                </div>
                  <h5>Deskripsi</h5>
                <div class='product-full-desc'>
                  <p>$deskripsi</p>
                </div>";
          if ($prod['stock'] != 0) {
             echo"<a href='order.php?pid=$prod[pid]'><button class= 'btn btn-main' style='background-color:  green;border-color: green;'>Beli</button></a></div></div>";            
          }elseif($prod['stock'] == 0)  {
             echo"<button class= 'btn btn-main'style='cursor: not-allowed; background-color:  red;border-color: red;'>Habis</button></div></div>"; 
          }
                                

                ;}?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="popular-brands">
        <div class="wrapper">
          <div class="brand-header">
            <h2>Partner Pengiriman Resmi</h2>
            <!-- <p>quality you can count on</p> -->
          </div>

          <div class="brands-grid">
            <img src="img/jne.png" alt="" />
            <img src="img/poi.png" alt="" />
            <img src="img/sicepat.png" alt="" />
            <img src="img/tiki.png" alt="" />
            <img src="img/ninja.png" alt="" />
          </div>
        </div>
      </div>
    </main>

    <footer>
        <div class="wrapper">
        <div class="footer-grid">
          <div class="footer-card">
            <h4>Artikel Tentang Covid-19</h4>
            <span>by hallosehat.com</span>

            <div>
              <ul>
                <li><a href="https://hellosehat.com/infeksi/covid19/tubuh-bugar-saat-puasa-selama-covid-19/">Tips saat puasa</a></li>
                <li><a href="https://hellosehat.com/infeksi/covid19/virus-corona-covid-19-sars-cov-2/">Covid-19</a></li>
                <li><a href="https://hellosehat.com/infeksi/covid19/persiapan-saat-new-normal/">New Normal</a></li>
                <li><a href="https://hellosehat.com/nutrisi/nutrisi-untuk-mencegah-covid-19/">Pencegahan</a></li>
              </ul>
            </div>
          </div>

          <div class="footer-card">
            <h4>Artikel Tentang Penyakit</h4>
            <span>by hallosehat.com</span>

            <div>
              <ul>
                <li><a href="https://hellosehat.com/parenting/kesehatan-anak/penyakit-pada-anak/anak-kurang-gizi/">Kurang Gizi</a></li>
                <li><a href="https://hellosehat.com/kanker/pengertian-kanker/">kanker</a></li>
                <li><a href="https://hellosehat.com/infeksi/penyakit-infeksi/">Infeksi</a></li>
                <li><a href="https://hellosehat.com/hidup-sehat/tips-pola-hidup-sehat/">Hidup Sehat</a></li>
              </ul>

              <ul>
                <li><a href="https://hellosehat.com/gigi-mulut/gigi/sakit-gigi/">sakit Gigi</a></li>
                <li><a href="https://hellosehat.com/saraf/sakit-kepala/migrain/">Migren</a></li>
              </ul>
            </div>
          </div>

          <div class="footer-card">
            <h4>Artikel Lainnya</h4>
            <span>by hallosehat.com</span>

            <div>
              <ul>
                <li><a href="https://hellosehat.com/hidup-sehat/pertolongan-pertama/perawatan-luka/">Perawatan Luka</a></li>
                <li><a href="https://hellosehat.com/nutrisi/fakta-gizi/manfaat-vitamin-c/">Vitamin C</a></li>
                <li><a href="https://hellosehat.com/penyakit-kulit/vitamin-untuk-kulit/">Vitamin Kulit</a></li>
                <li><a href="https://hellosehat.com/obat-suplemen/betadine/">Betadine</a></li>
              </ul>

              <ul>
                <li><a href="https://hellosehat.com/obat-suplemen/imboost-force/">Imboost Force</a></li>
                <li><a href="https://hellosehat.com/sehat/informasi-kesehatan/jenis-masker/">Jenis Masker</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
      $(".slider-container").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        dots: true,

        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 580,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    </script>
  </body>
</html>
