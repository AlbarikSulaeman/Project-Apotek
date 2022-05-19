-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2021 pada 11.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` varchar(8) NOT NULL,
  `qty` int(3) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pid` int(6) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `surat_dokter` varchar(100) DEFAULT NULL,
  `nprod` varchar(100) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `uid` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `qty`, `pembayaran`, `total`, `alamat`, `pid`, `penerima`, `surat_dokter`, `nprod`, `tanggal`, `status`, `uid`) VALUES
('11265117', 3, 'ditempat', 96000, 'asd', 839892, 'ASD', 'surdok1.jpg', 'Prednisone phapros,100 tablet', '20 - 06 - 21', 'Pengecekan Surat Dokter', 'ri1hnfja'),
('11513363', 1, 'ditempat', 35000, 'bogor', 872972, 'ALBARIK', '0', 'Betadine solution, 15ml/botol', '29 - 05 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('16699231', 10, 'ditempat', 205000, 'bogor', 229799, 'ALBARIK', '0', 'Betamol, 500g 10 kaplet/strip', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('18592504', 2, 'ditempat', 70000, 'bogor', 872972, 'ALBARIK', '0', 'Betadine solution, 15ml/botol', '15 - 06 - 21', 'Pesanan Sedang Dikirim', 'peb12fir'),
('24130927', 5, 'ditempat', 52500, 'bogor', 716982, 'ALBARIK', '0', 'Ibuprofen proris caplet, 10caplet/strip', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('29038667', 2, 'ditempat', 70000, 'bogor', 872972, 'ALBARIK', '0', 'Betadine solution, 15ml/botol', '11 - 06 - 21', 'Pesanan Dibatalkan', 'peb12fir'),
('38157193', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('40327846', 10, 'ditempat', 205000, 'bogor', 229799, 'ALBARIK', '0', 'Betamol, 500g 10 kaplet/strip', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('43341756', 10, 'ditempat', 105000, 'bogor', 716982, 'ALBARIK', '0', 'Ibuprofen proris caplet, 10caplet/strip', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('54840170', 2, 'ditempat', 21000, 'bogor', 716982, 'ALBARIK', '0', 'Ibuprofen proris caplet, 10caplet/strip', '29 - 05 - 21', 'Pesanan Dibatalkan', 'peb12fir'),
('55910814', 3, 'ditempat', 105000, 'test', 872972, 'USER', '0', 'Betadine solution, 15ml/botol', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'qvoztot5'),
('59811302', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('69497985', 10, 'ditempat', 105000, 'bogor', 716982, 'ALBARIK', '0', 'Ibuprofen proris caplet, 10caplet/strip', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('69764836', 3, 'ditempat', 61500, 'test', 229799, 'USER', '0', 'Betamol, 500g 10 kaplet/strip', '16 - 06 - 21', 'Pesanan Sedang Disiapkan', 'qvoztot5'),
('73506239', 12, 'ditempat', 576000, 'test', 297833, 'USER', '0', 'Parasetamol panadol syrup anak , 60ml/botol', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'qvoztot5'),
('76131991', 2, 'ditempat', 6000000, 'bogor', 665432, 'ALBARIK', '0', ' Kursi roda', '20 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('76920390', 3, 'ditempat', 22500, 'bogor', 239753, 'ALBARIK', 'Screenshot (92).jpg', 'Amoxicilin dry syrup, 100mg/ml', '18 - 06 - 21', 'Pesanan Sedang Disiapkan', 'peb12fir'),
('78852273', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('81545791', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('90031391', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('90577059', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('95119113', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('97630964', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir'),
('98946556', 12, 'ditempat', 84000, 'bogor', 216929, 'ALBARIK', '0', 'Sangobion Strip 4 Kapsul', '12 - 06 - 21', 'Pesanan Sudah Diterima', 'peb12fir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `pid` int(6) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `stock` int(5) NOT NULL,
  `categories` varchar(50) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `foto_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`pid`, `name_product`, `stock`, `categories`, `price`, `deskripsi`, `foto_produk`) VALUES
(123456, 'bodrex kapsul, 1 box, 2 strip 20 kapsul', 10, 'Obat ', 9000, 'Bodrex bermanfaat untuk mengatasi sakit kepala. Selain untuk mengatasi sakit kepala, terdapat varian produk Bodrex Flu dan Batuk PE yang bermanfaat untuk meredakan gejala batuk pilek.', 'Bodrex.png'),
(216929, 'Sangobion Strip 4 Kapsul', 28, 'Obat', 7000, 'Sangobion bermanfaat untuk mengatasi kurang darah atau anemia. Sebagai suplemen penambah darah, Sangobion berisi zat besi yang dapat mencegah dan mengatasi anemia defisiensi besi.', 'sangobion.jpg'),
(229799, 'Betamol, 500g 10 kaplet/strip', 30, 'Obat', 20500, 'Betamol adalah obat yang diproduksi oleh Balatif. Obat ini mengandung Paracetamol yang diindikasikan untuk menurunkan demam dan meredakan nyeri ringan hingga sedang. Mekanisme kerja obat ini adalah dengan menghambat enzim cyclooxygenase (COX). Enzim COX berperan pada pembentukan prostaglandin (senyawa penyebab nyeri). Jika kerja enzim COX dihambat, maka jumlah prostaglandin pada sistem saraf pusat menjadi berkurang, sehingga respon tubuh terhadap nyeri berkurang. Betamol menurunkan suhu tubuh de', 'betamol.jpg'),
(239753, 'Amoxicilin dry syrup, 100mg/ml', 27, 'Obat Keras', 7500, 'Amoxicillin adalah obat untuk mengatasi berbagai jenis infeksi bakteri. Obat antibiotik ini tersedia dalam bentuk tablet maupun sirup. Amoksisilin atau amoxicillin akan menghambat pertumbuhan bakteri yang menyebabkan infeksi di organ paru- paru, saluran kemih, kulit, serta di bagian telinga, hidung, dan tenggorokan. Amoxicilin tidak digunakan untuk mengatasi infeksi virus, termasuk infeksi virus Corona atau Covid-19.', 'amoxcillin.jpg'),
(297833, 'Parasetamol panadol syrup anak , 60ml/botol', 15, 'Obat Anak', 48000, 'Acetaminophen atau paracetamol adalah obat untuk penurun demam dan pereda nyeri, seperti nyeri haid dan sakit gigi.', 'paracetamol.jpg'),
(458290, 'Chloramphenical, 250mg10 strip capsul', 10, 'Obat Keras', 95500, ' chloramphenical atau kloramfenikol adalah obat antibiotik untuk mengatasi beragam infeksi bakteri serius, terutama saat penyakit infeksi tidak membaik dengan obat lain. Chloramphenicol bekerja dengan cara membasmi bakteri penyebab infeksi, atau memperlambat hingga menghentikan pertumbuhannya. Obat ini efektif menangani infeksi akibat S. typhi, H. influenzae, E. coli, C. psitacci, serta beragam spesies bakteri Neisseria, Staphylococcus, Streptococcus, dan Rickettsia.', 'Chloramphenical.jpg'),
(533818, 'Ampicillin Trihydrate Novapharin 500 MG Box 100 KA', 13, 'Obat Keras', 131000, 'Ampicilin adalah antibiotik yang digunakan untuk mengobati infeksi bakteri. Penyakit yang bisa diatasi dengan penisilin antara lain infeksi saluran pernapasan, infeksi telinga tengah, atau demam reumatik. ampicilin membunuh bakteri dengan cara menghambat pembentukan dinding sel bakteri. Perlu diingat, penisilin hanya efektif untuk mengatasi infeksi yang disebabkan oleh bakteri. Obat ini tidak bisa mengatasi infeksi virus, jamur, atau cacing.', 'Ampicillin.jpg'),
(557891, '3M 8511 N95 Particulate Respirator Masker, 1 buah', 20, 'Alat Kesehatan', 30000, 'masker ini dapat menyaring 95% kuman dengan penggunaan yang tepat. Selain itu, masker anti virus ini dapat mencegah partikel PM 2.5 (berukuran 2.5 mikrometer). Ukuran partikel tersebut sering terdapat di udara dan menyebabkan deposit plak pada hidung, paru-paru, dan bahkan pembuluh darah arteri. Sisi tepi masker N95 lebih rapat, sehingga partikel dan bakteri tidak mudah masuk maupun keluar.', 'masker.jpg'),
(566789, 'Alat bantu berjalan', 4, 'Alat Kesehatan', 265000, ' 4 kaki dapat dipakai statis (diangkat),dan juga bisa digerakkan kanan kiri. (praktis, dapat dilipat, diatur ketinggiannya, mudah digunakan)\r\nwarna: grey/silver metalic 4 kaki dapat dipakai statis (diangkat),dan juga bisa digerakkan kanan kiri. (praktis, dapat dilipat, diatur ketinggiannya, mudah digunakan)\r\nwarna: grey/silver metalic', 'Alat Bantu Jalan.jpg'),
(567789, 'Termometer digital', 5, 'Alat Kesehatan', 125000, 'Alat Pengukur Suhu Badan yang Sangat dibutuhkan untuk perlengkapan Kesehatan. Mudah & Praktis Penggunaannya. Diskripsi Produk:Spesifikasi: Hasil dalam 20 detikDigunakan untuk pengukuran temperatur di Mulut, ketiak , dan Rectum Memory Recall untuk pengukuran ', 'Termometer.jpg'),
(567889, 'Handsaplast, 1box 20 lembar', 9, 'Alat Kesehatan', 11000, 'Hansaplast Kain Elastis merupakan plester serba guna untuk semua jenis luka ringan. Dengan keunggulan:\r\n- Melindungi dari kotoran dan bakteri, dan mencegah infeksi pada luka.\r\n]', 'handsaplast.jpg'),
(639983, 'promag kapsul, 12kapsul/strip', 30, 'Obat', 8200, 'PROMAG merupakan obat sakit maag dengan kandungan Hydrotalcite, Mg(OH)2, Simethicone dalam bentuk tablet. Obat ini digunakan untuk mengurangi gejala yang berhubungan dengan kelebihan asam lambung, gastritis, tukak lambung, tukak usus 12 jari, dengan gejala-gejala seperti mual, nyeri lambung, nyeri ulu hati, kembung dan perasaan penuh pada lambung.', 'PROGMAGH.jpg'),
(654221, 'Piroxicam,20mg, 10tablet/strip', 4, 'Obat Keras', 3800, 'Piroxicam atau piroxicam adalah obat untuk mengatasi peradangan sendi, misalnya akibat penyakit asam urat. Piroxicam dapat mengurangi gejala-gejala radang sendi, seperti nyeri dan pembengkakan. Piroxicam tersedia dalam bentuk tablet 10 mg dan 20 mg. Selain itu, piroxicam juga tersedia dalam bentuk gel untuk mengatasi nyeri setempat.', 'Piroxicam.jpg'),
(654311, 'Dexamethasone,0,5mg 10 tablet', 7, 'Obat Keras', 1100, 'Dexamethasone adalah obat untuk mengatasi peradangan, reaksi alergi, dan dan penyakit autoimun. Obat ini tersedia dalam bentuk tablet 0,5 mg, sirup, suntikan (injeksi), dan tetes mata.\r\nDexamethasone termasuk ke dalam golongan obat kortikosteroid. Obat ini hanya boleh digunakan atas resep dokter. Sama halnya dengan obat kortikosteroid lainnya, dexamethasone yang telah digunakan untuk jangka panjang tidak boleh dihentikan secara tiba-tiba. Dokter akan menurunkan dosis dexamethasone secara bertaha', 'Dexamethasone.jpg'),
(654321, 'Imboost force, 1pack 10 kaplet', 4, 'Obat', 30000, 'Imboost bermanfaat untuk meningkatkan sistem kekebalan tubuh. Obat herbal ini akan melindungi tubuh dari serangan virus, seperti batuk pilek biasa (common cold) dan flu. Imboost memiliki beberapa jenis, seperti Imboost Tablet, Imboost Force, Imboost Force Extra Strength, Imboost Kids Sirup, dan Imboost Force Sirup.', 'Imboost.jpg'),
(654331, 'Alprazolam, 10 tablet/strip', 12, 'Obat Keras', 6500, 'Alprazolam adalah obat untuk mengatasi gangguan kecemasan dan gangguan panik. Obat ini dapat mengurangi ketegangan psikologis yang dirasakan, sehingga membuat orang yang mengonsumsinya dapat merasa lebih tenang. \r\nAlprazolam bekerja di dalam saraf otak untuk menghasilkan efek menenangkan dengan meningkatkan aktivitas zat kimia alami dalam tubuh yang disebut asam gamma-aminobutirat (GABA).\r\n', 'alprazolam.jpg'),
(655321, 'Tetracylin kapsul, 500mg', 6, 'Obat Keras', 2000, 'Tetracycline hcl adalah obat antibiotik yang digunakan untuk mengobati penyakit akibat infeksi bakteri, seperti anthrax, sifilis, gonore, infeksi saluran kemih, infeksi kulit, atau infeksi saluran pencernaan. Tetracycline hcl bekerja dengan menghambat pertumbuhan dan perkembangan bakteri. Obat ini juga bisa digunakan untuk mengatasi infeksi bakteri yang berat, yang tidak bisa diatasi oleh antibiotik jenis lain, seperti penisilin', 'Tetracylin.jpg'),
(665432, ' Kursi roda', 0, 'Alat Kesehatan', 3000000, 'Powder Coating steel frame\r\nFixed armrest\r\nFixed footrest\r\nSolid castor\r\nSolid rear wheel\r\nSeat width: 46cm\r\nMaximum loading 100 kg\r\nNet weight: 15.9 kg\r\n', 'Kursi roda.jpg'),
(716982, 'Ibuprofen proris caplet, 10caplet/strip', 25, 'Obat', 10500, 'Ibuprofen adalah obat yang digunakan untuk meredakan nyeri dan peradangan, misalnya sakit gigi, nyeri haid, dan radang sendi.\r\n', 'ibuprofen.jpg'),
(811809, 'Loratadine, 10 mg 50 tablet', 23, 'Obat Keras', 27000, 'Loratadine adalah obat yang dapat mengatasi gejala alergi, seperti bersin-bersin, pilek, hidung tersumbat, dan ruam kulit yang terasa gatal. Gejala alergi ini bisa muncul akibat paparan alergen, misalnya debu, bulu hewan, gigitan serangga, atau makanan. bPada sebagian orang, paparan alergen tersebut dapat menyebabkan tubuh memproduksi dan melepaskan zat histamin. Zat inilah yang memicu terjadinya reaksi alergi. Loratadine bekerja dengan menghambat kerja zat histamin tersebut.', 'Loratadine.jpg'),
(839892, 'Prednisone phapros,100 tablet', 15, 'Obat Keras', 32000, 'Prednison adalah obat untuk mengurangi peradangan pada alergi, penyakit autoimun, penyakit persendian dan otot, serta penyakit kulit. Prednison merupakan salah satu jenis dari obat kortikosteroid.', 'prednisone.jpg'),
(872972, 'Betadine solution, 15ml/botol', 12, 'Antiseptik', 35000, 'Betadine adalah antiseptik yang digunakan untuk membersihkan luka dan mencegah terjadinya infeksi pada luka.', 'betadine.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `uid` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`uid`, `username`, `fullname`, `alamat`, `role`, `password`) VALUES
('2b8br3xv', 'USER BARU', 'user baru', 'alamat baru', 'user', '1a1dc91c907325c69271ddf0c944bc72'),
('peb12fir', 'ALBARIK', 'Albarik Sulaeman', 'bogor', 'admin', 'b472e00f509926c3b3c80a6c02c08b52'),
('qvoztot5', 'USER', 'user test', 'test', 'user', '6ad14ba9986e3615423dfca256d04e3f'),
('ri1hnfja', 'ASD', 'asd', 'asd', 'user', '7815696ecbf1c96e6894b779456d330e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
