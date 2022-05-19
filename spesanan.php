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
 }
 include("koneksi.php");
 $item = mysqli_query($mysql, "SELECT * FROM tb_order");
 $item_batal= mysqli_query($mysql, "SELECT * FROM tb_order WHERE status = 'Pesanan Dibatalkan'");
 $item_tolak= mysqli_query($mysql, "SELECT * FROM tb_order WHERE status = 'Pesanan Ditolak'");
 $item_terima= mysqli_query($mysql, "SELECT * FROM tb_order WHERE status = 'Pesanan Sudah Diterima'");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
  background-color: #f5f5f5;
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
            <li><a href="#terbatalkan">Pesanan Yang Dibatalkan</a></li>
            <li><a href="#tertolak">Pesanan Yang Ditolak</a></li>
            <li><a href="#terkirim">Pesanan Yang Sudah Sampai</a></li>
            <li><a href="kpesanan.php">Kembali</a></li>
          </li>
        </ul>
      </div>
    </div>

    <header>
    	<span id="atas"></span>
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

          <ul>
            <li><a href="#terbatalkan">Pesanan Yang Dibatalkan</a></li>
            <li><a href="#tertolak">Pesanan Yang Ditolak</a></li>
            <li><a href="#terkirim">Pesanan Yang Sudah Sampai</a></li>
            <li><a href="kpesanan.php">Kembali</a></li>
          </ul>

          <label for="toggle-nav">
            <i class="fas fa-list"></i>
          </label>
        </div>
      </nav>
    </header>
 	<table border="1">
 		<tr>
			<td colspan="8">Seluruh Pesanan :</td>
		</tr>
		<tr>

			<th>ID pesanan</th>
			<th>Nama produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Alamat</th>
			<th>Penerima</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>

		</tr>
		
	
			<?php  
			while ($prod = mysqli_fetch_array($item)) {
    			echo "<tr><td>".$prod['id']."</td>";
    			echo "<td>".$prod['nprod']."</td>";
    			echo "<td>".$prod['qty']."</td>";
    			echo "<td>RP.".$prod['total']."</td>";
    			echo "<td>".$prod['alamat']."</td>";
    			echo "<td>".$prod['penerima']."</td>";
    			echo "<td>".$prod['tanggal']."</td>";
    			echo "<td>".$prod['status']."</td></tr>";
			}
			?>
		
		<tr>
			<td><li><a href="#atas">Ke atas</a></li></td><td colspan="7">Pesanan Yang Dibatalkan :<div id="terbatalkan"></div></td>
		</tr>
		<tr>
			<th>ID pesanan</th>
			<th>Nama produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Alamat</th>
			<th>Penerima</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			
		</tr>
	
			<?php  
			while ($prod1 = mysqli_fetch_array($item_batal)) {
    			echo "<tr><td>".$prod1['id']."</td>";
    			echo "<td>".$prod1['nprod']."</td>";
    			echo "<td>".$prod1['qty']."</td>";
    			echo "<td>RP.".$prod1['total']."</td>";
    			echo "<td>".$prod1['alamat']."</td>";
    			echo "<td>".$prod1['penerima']."</td>";
    			echo "<td>".$prod1['tanggal']."</td>";
    			echo "<td>".$prod1['status']."</td><tr>";
    		}
			?>
		
		<tr>
			<td><li><a href="#atas">Ke atas</a></li></td><td colspan="7">Pesanan Yang Ditolak :<div id="tertolak"></div></td>
		</tr>
		<tr>
			
			<th>ID pesanan</th>
			<th>Nama produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Alamat</th>
			<th>Penerima</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			
		</tr>
	
			<?php  
			while ($prod1 = mysqli_fetch_array($item_tolak)) {
    			echo "<tr><td>".$prod1['id']."</td>";
    			echo "<td>".$prod1['nprod']."</td>";
    			echo "<td>".$prod1['qty']."</td>";
    			echo "<td>RP.".$prod1['total']."</td>";
    			echo "<td>".$prod1['alamat']."</td>";
    			echo "<td>".$prod1['penerima']."</td>";
    			echo "<td>".$prod1['tanggal']."</td>";
    			echo "<td>".$prod1['status']."</td></tr>";
    		}
			?>
		
		<tr>
			<td><a href="#atas">Ke atas</a></td><td colspan="7"><div id="terkirim">Pesanan Yang Sudah Sampai :</div></td>
		</tr>
		<tr>
			
			<th>ID pesanan</th>
			<th>Nama produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Alamat</th>
			<th>Penerima</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			
		</tr>
	
			<?php  
			while ($prod1 = mysqli_fetch_array($item_terima)) {
    			echo "<tr><td>".$prod1['id']."</td>";
    			echo "<td>".$prod1['nprod']."</td>";
    			echo "<td>".$prod1['qty']."</td>";
    			echo "<td>RP.".$prod1['total']."</td>";
    			echo "<td>".$prod1['alamat']."</td>";
    			echo "<td>".$prod1['penerima']."</td>";
    			echo "<td>".$prod1['tanggal']."</td>";
    			echo "<td>".$prod1['status']."</td></tr>";
    		}
			?>
		
 	</table>
 </body>
 </html>