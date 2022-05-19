<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      tr{
        margin-top: 10px;
      }
      td{
        margin left: 10px;
        text-align: center;
        padding-left: 10px;
        padding-right: 10px;
      }
      table{
        border-collapse: collapse;
        margin-left: 10px;
      }
    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum=1" />
    <title>Apotek 13</title>
    <style type="text/css">
          body {
  margin: 0;
  font-family: sans-serif;
}

* {
  box-sizing: border-box;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table td,
table th {
  padding: 12px 15px;
  border: 1px solid #ddd;
  text-align: center;
  font-size: 16px;
}

table th {
  background-color: #273c75;
  color: #ffffff;
}

table tbody tr:nth-child(even) {
  background-color: white;
}
.fpt-img {
  height: 200px;
  width: 200px;
  object-fit: contain;
}

/*responsive*/

@media (max-width: 500px) {
  table thead {
    display: none;
  }

  table,
  table tbody,
  table tr,
  table td {
    display: block;
    width: 100%;
  }
  table tr {
    margin-bottom: 15px;
  }
  table td {
    text-align: right;
    padding-left: 50%;
    text-align: right;
    position: relative;
  }
  table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding-left: 15px;
    font-size: 15px;
    font-weight: bold;
    text-align: left;
  }
}
    </style>
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
          <li><a href="add.php">Tambah Produk Baru</a></li>
            <li><a href="konfirmasi.php">Konfirmasi Pesanan</a></li>
            <li><a href="kpesanan.php">Kelola Pesanan</a></li>
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
            <li><a href="add.php">Tambah Produk Baru</a></li>
            <li><a href="konfirmasi.php">Konfirmasi Pesanan</a></li>
            <li><a href="kpesanan.php">Kelola Pesanan</a></li>
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
             <form method="post" action="adminpage.php">
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
      
    <table border="1">
      <tr>
      <th>No</th>
      <th>Produk</th>
      <th>Stock</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>deskripsi produk</th>
      <th>Photo produk</th>
      <th>Edit</th>

    </tr>   
    <?php  
      while ($prod = mysqli_fetch_array($item)) {
        $fproduk = "foto_produk/" . $prod['foto_produk'];
          echo "<tr><td class='no'>".$no++."</td>";
          echo "<td>".$prod['name_product']."</td>";
          echo "<td>".$prod['stock']."</td>";
          echo "<td>".$prod['categories']."</td>";
          echo "<td>RP.".$prod['price']."</td>";
          echo "<td>".$prod['deskripsi']."</td>";
          echo "<td><img class='fpt-img' src='$fproduk'></td>";    
          echo "<td><a href='hapus.php?pid=$prod[pid]'><button class= 'btn btn-main btn-block'  style='background-color: red; border-color: red;'>Hapus</button></a><br><a href='edit.php?pid=$prod[pid]'><button class= 'btn btn-main btn-block'>Edit</button></a></td></tr>"; 
      } ?>
  </table>
       </div>
          </div>
        </div>
      </div>