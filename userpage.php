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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  </head>
  <body>
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
    

 // cek login
 if($_SESSION['login'] == false){
  header('Location: login.php');
 }                              
 elseif ($_SESSION['login'] == true) {
  $uid = $_SESSION['uid'];
  $fullname = $_SESSION['fullname'];
 }

include ("koneksi.php");
if (isset($_POST['trap'])) {
  if ($_POST['per1']== 'a' ) {
    $item1 = 'ORDER BY name_product ASC';
    $selected1 = "selected = selected";
  $selected2 = "";
  $selected3 = "";
  $selected4 = "";
  
  }elseif ($_POST['per1'] == 'z') {
    $item1 = 'ORDER BY name_product DESC';
    $selected1 = "";
  $selected2 = "selected = selected";
  $selected3 = "";
  $selected4 = "";
  
  }elseif ($_POST['per1'] == 'termurah') {
    $item1 = 'ORDER BY price ASC';
    $selected1 = "";
  $selected2 = "";
  $selected3 = "selected = selected";
  $selected4 = "";
  
  }elseif ($_POST['per1'] == 'termahal') {
    $item1 = 'ORDER BY price DESC';
    $selected1 = "";
  $selected2 = "";
  $selected3 = "";
  $selected4 = "selected = selected";
  
  }else{
    $item1=" ";
    $selected1 = "";
  $selected2 = "";
  $selected3 = "";
  $selected4 = "";
  
  }if ($_POST['per'] == 'obat') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE categories = 'Obat' $item1");
  $selectedz = "";
  $selecteda = "selected = selected";
  $selectedb = "";
  $selectedc = "";
  $selectedd = "";
  }elseif ($_POST['per'] == 'all') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product $item1");
  $selectedz = "selected = selected";
  $selecteda = "";
  $selectedb = "";
  $selectedc = "";
  $selectedd = "";
  }elseif ($_POST['per'] == 'obatk') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE categories = 'Obat Keras' $item1");
  $selectedz = "";
  $selecteda = "";
  $selectedb = "selected = selected";
  $selectedc = "";
  $selectedd = "";
  }elseif ($_POST['per'] == 'obata') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE categories = 'Obat Anak' $item1");
  $selectedz = "";
  $selecteda = "";
  $selectedb = "";
  $selectedc = "selected = selected";
  $selectedd = "";
  }elseif ($_POST['per'] == 'lainnya') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product WHERE categories != 'Obat Anak' AND categories != 'Obat' AND categories != 'Obat Keras' $item1");
$selecteda = "";
  $selectedb = "";
  $selectedc = "";
  $selectedd = "selected = selected";
  $selectedz = "";
  }elseif ($_POST['per'] == 'sortir') {
    $item = mysqli_query($mysql, "SELECT * FROM tb_product ORDER BY name_product ASC");
     $selecteda = "";
  $selectedb = "";
  $selectedc = "";
  $selectedd = "";
  $selectedz = "";
}
}else{
  $item = mysqli_query($mysql, "SELECT * FROM tb_product ORDER BY price ASC");
  $selected1 = "";
  $selected2 = "";
  $selected3 = "";
  $selected4 = "";
  $selecteda = "";
  $selectedb = "";
  $selectedc = "";
  $selectedd = "";
  $selectedz = "";
  
} $no = 1;
?>
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
          <li><a href="pesanan.php">Pesanan</a></li>
            <li><a href="logout.php">Logout</a></li>
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

          <div class="nav-icons">
            <span><?php echo $fullname; ?></span>
            <i class="fas fa-user"></i>
          </div>
        </div>

        <div class="bot-header">
          <div class="brand">
            <img src="img/pharmacy.svg" width="30px" alt="" />
            <h5>Apotek 13</h5>
          </div>

          <ul>
            <li><a href="pesanan.php">Pesanan</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>

          <label for="toggle-nav">
            <i class="fas fa-list"></i>
          </label>
        </div>
      </nav>
    </header>

    <div class="hero-wrapper">
      <div class="hero-section">
        <h1>Stay Health :)</h1>
        <p>Beli Obat Dari Mana Saja</p>
      </div>

      <div class="hero-search">
        <div class="wrapper">
          <div class="search-grid">
            <div>
              <div>
              </div>
            </div>
            <div>
             <form method="post" action="userpage.php">
              <select name="per1" class="form-control" id="">
                  <option style="color: grey; cursor: none;" value="sortir" disabled="disabled">Sortir</option>
                  <option value="a"<?php echo $selected1; ?>>A-Z</option>
                  <option value="z"<?php echo $selected2; ?>>Z-A</option>
                  <option value="termurah"<?php echo $selected3; ?>>Termurah</option>
                  <option value="termahal"<?php echo $selected4; ?>>Termahal</option>
              </select>
            </div>
            <div>
              <select name="per" class="form-control" id="">
                <option style="color: grey; cursor: none;" value="sortir" disabled="disabled">Kategori</option>
                <option value="all"<?php echo $selectedz; ?>>Semua</option>
                <option value="obat"<?php echo $selecteda; ?>>Obat</option>
                <option value="obatk"<?php echo $selectedb; ?>>Obat Keras</option>
                <option value="obata"<?php echo $selectedc; ?>>Obat Anak</option>
                <option value="lainnya"<?php echo $selectedd; ?>>Lainnya</option>
              </select>
            </div>
            <div>
             <input type="submit" name="trap" class="btn btn-main btn-block" value="Search">
            </div></form>
          </div>
        </div>
      </div>
    </div>

    <main>
      
    <table style="cursor: not-allowed; background-color:  red;border-color: red;">
     <div style="height: 700px; overflow: scroll;  padding-right: 25px; padding-left: 25px;">      
    <?php  
      while ($prod = mysqli_fetch_array($item)) {
        $fproduk = "foto_produk/" . $prod['foto_produk'];
          echo "<div class = 'prod-cont' style='height: 350px;margin-left: 15px;'><div style='height: 300px;'><div><img src='$fproduk'  height= '100px' class='foto-produk-jual'></div>"; 
          echo "<div class ='product_label' style='max-width: 240px; height:'30px'; margin-top: 10px;>".$prod['name_product']."</div>";
          echo "<div>Harga : RP.".$prod['price']."</div></div>";
          echo "<div><a href='produk.php?pid=$prod[pid]'><button class= 'btn btn-main'>Detail</button></a>";
          if ($prod['stock'] != 0) {
             echo"<a href='order.php?pid=$prod[pid]'><button class= 'btn btn-main' style='background-color:  green;border-color: green;'>Beli</button></a></div></div>";            
          }elseif($prod['stock'] == 0)  {
             echo"<button class= 'btn btn-main'style='cursor: not-allowed; background-color:  red;border-color: red;'>Habis</button></div></div>"; 
          }           
          
      } ?>
    </div>
  </table>
       </div>
          </div>
        </div>
      </div>

      <div class="banner-section">
        <div class="wrapper">
          <div class="banner-text">
            <h1>Rekomendasi Ramadhan</h1>
            <p>Promag Kapsul</p>
            <a href='order.php?pid=639983' class="btn btn-main" style="padding-top: 5px;">Beli</a>
          </div>
        </div>
      </div>

      <div class="promo-section">
        <div class="wrapper">
          <div class="promo-grid">
            <div class="promo-banner-text">
              <h2>Beli Obat Dari Mana Saja</h2>
              <p>Cepat, Aman, Sesuai</p>
            </div>

            <div class="promo-card">
              <div class="promo-gmbr">
                <img src="foto_produk/betadine.jpg" width="100%" alt="" />
              </div>
              <div class="promo-text">
                <a href="produk.php?pid=872972">Betadine</a>
              </div>
            </div>

            <div class="promo-card">
              <div class="promo-gmbr">
                <img src="foto_produk/paracetamol.jpg" width="100%" alt="" />
              </div>
              <div class="promo-text">
                <a href="produk.php?pid=297833">Paracetamol Anak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="popular-brands">
        <div class="wrapper">
          <div class="brand-header">
            <h2>Bonus Spesial</h2>
          </div>

      <div class="features-section">
        <div class="wrapper">
          <div class="features-grid">
            <div class="feature-single">
              <div>
                <i class="fas fa-truck"></i>
              </div>
              <span>gratis ongkir</span>
            </div>

            <div class="feature-single">
              <div>
                <i class="fas fa-truck"></i>
              </div>
              <span>gratis ongkir</span>
            </div>

            <div class="feature-single">
              <div>
                <i class="fas fa-truck"></i>
              </div>
              <span>gratis ongkir</span>
            </div>

            <div class="feature-single">
              <div>
                <i class="fas fa-truck"></i>
              </div>
              <span>gratis ongkir</span>
            </div>

            <div class="feature-single">
              <div>
                <i class="fas fa-truck"></i>
              </div>
              <span>gratis ongkir</span>
            </div>
          </div>
        </div>
      </div>

      <div class="popular-brands">
        <div class="wrapper">
          <div class="brand-header">
            <h2>Partner Pengiriman Resmi</h2>
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
