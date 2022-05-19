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
 $item = mysqli_query($mysql, "SELECT * FROM tb_order WHERE status != 'Pengecekan Surat Dokter' AND status != 'Pesanan Dibatalkan' AND status != 'Pesanan Ditolak' AND status != 'Pesanan Sudah Diterima' ORDER BY tanggal ASC");
 $no = 1;
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

          <ul>
            <li><a href="spesanan.php">Seluruh Pesanan</a></li>
            <li><a href="adminpage.php">Kembali</a></li>
          </ul>

          <label for="toggle-nav">
            <i class="fas fa-list"></i>
          </label>
        </div>
      </nav>
    </header>
 	<table border="1">
 		<tr>
			<th>No</th>
			<th>ID pesanan</th>
			<th>Nama produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Pembayaran</th>
			<th>Alamat</th>
			<th>Penerima</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			<th></th>

		</tr>
		<tr>
			<?php  
			while ($prod = mysqli_fetch_array($item)) {
				$surdok = "surat_dokter/" . $prod['surat_dokter'];
				echo "<tr><td class='no'>".$no++."</td>";
    			echo "<td>".$prod['id']."</td>";
    			echo "<td>".$prod['nprod']."</td>";
    			echo "<td>".$prod['qty']."</td>";
    			echo "<td>RP.".$prod['total']."</td>";
    			echo "<td>".$prod['pembayaran']."</td>";
    			echo "<td>".$prod['alamat']."</td>";
    			echo "<td>".$prod['penerima']."</td>";
    			echo "<td>".$prod['tanggal']."</td>";
    			echo "<td>".$prod['status']."</td>";
    			if ($prod['status'] == 'Pesanan Sedang Disiapkan') {
    				echo "<td><a href='konfirmasi2.php?id=$prod[id]&&status=kirim'><button class='btn btn-main'>kirim</button></a>";
    			}elseif ($prod['status'] == 'Pesanan Sedang Dikirim') {
    				echo "<td><a href='konfirmasi2.php?id=$prod[id]&&qty=$prod[qty]&&nprod=$prod[nprod]&&status=sampai'><button class='btn btn-main'>Sampai</button></a>";
    			}
    			
				
			}
			?>
		</tr>
 	</table>
 </body>
 </html>