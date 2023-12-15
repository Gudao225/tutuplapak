-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 03.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtutuplapak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('admin', 'dc260209edeb90fc4ed14aad787cde02'),
('hiuze', '7f53bb647e5855c9effcd3d5e2f3cc6f'),
('hizu', 'hizu'),
('ryzanaki', 'ryzanaki'),
('ryzanaki', 'ryzanaki'),
('aku', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(4) UNSIGNED ZEROFILL NOT NULL,
  `kode_customer` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `kode_customer`, `total`, `nama`, `provinsi`, `kota`, `alamat`, `kodepos`) VALUES
(0041, 'C003', 19500, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0042, 'C003', 60000, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0043, 'C003', 60000, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0044, 'C003', 60000, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0045, 'C003', 60000, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0049, 'C003', 216000, 'Hanizouka', 'Jawa Timur', 'Malang', 'Malang', '61566'),
(0050, 'C003', 49500, 'sandy', 'Jawa Timur', 'Malang', 'Malang', '61566a'),
(0051, 'C004', 19500, 'putranyok', 'batu', 'batu', 'batu gerdu etan', '61563'),
(0052, 'C003', 120000, 'Hanizouka', 'Dampit', 'Malang', 'batu tlogomas', '61566');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama`, `email`, `username`, `password`, `telp`) VALUES
('C003', 'hanizouka', 'sanditri145@gmail.com', 'Hanizouka', '$2y$10$ZOWulrEnAr0BKDljbakoje1xF49wS4TCQppr90LtVEezMT507BnF6', '085231657380'),
('C004', 'putrafebriansyah', 'putranyok@gmail.com', 'putranyok', '$2y$10$BHjeDKNuofwfZJsQ3PdPBOkD.0cFu9T.EhqFQ6scHYC3lx8iLhFbW', '0812345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode_customer` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`) VALUES
(52, 'C003', 'B002', 'Baju Kaos Dewasa DJ JACK U ', 1, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
('B001', 'TSHIRT DAZZLE - WHITE DAZZLE 002 - L', 'shirt.jpeg', 'Kondisi: Baru Min. Pemesanan: 1 Buah Etalase: Tshirt Band MERK : OFFICIAL DAZZLE CODE : DAZZLE - WHITE DAZZLE 002 ITEM : TSHIRT FREE STICKER', 195000),
('B002', 'Baju Kaos Dewasa DJ JACK U ', '637a119648578ec9d6e42871aa7a7c97.jpg', ' Merk : REEDSHARK  ? Bahan 100% Cotton Combed 30s. Adem dan tidak panas, tekstur yang sangat halus, menyerap keringat dengan sangat baik.  ? Sablon Flocking (bludru) Electrik System High Quality, menjadi lebih kuat dan tidak mudah rontok  ? Tipe Jahitan Rantai di pundak (pakai rib berkualitas) dan pola panjang tidak mengatung.  ? Tersedia Ukuran Size : S, M, L, XL, XXL.', 120000),
('B003', 'reflective tshirt', '3228dc7005f2a60ca35f9d49b747340f.jpg', 'bahannya nyaman', 29500),
('B004', 'nextsotp 006 topi baseball wanita', 'download.jpeg', 'berat: 90g  ukuran:  panjang: 8 cm  lingkar topi: 56-60 cm (dapat disesuaikan)  tinggi topi: 11 cm  bahan: katun + polyester  kemasan: (tanpa box, menggunakan kemasan kantong plastik logo mlb)', 135500),
('B005', 'JIANGXIHUITIAN Topi Baseball Polos - xx2 - Black with White Side', 'topi-baseball-polos.jpg', 'Penggunaan Sehari-hari Topi sangat cocok untuk digunakan dalam kegiatan sehari hari ataupun olahraga di luar ruangan. Kepala Anda tidak akan terkena panas terik sinar matahari secara langsung yang mungkin dapat mempengaruhi kondisi tubuh Anda. Dapat Anda gunakan sebagai fashion model sehari-hari.  Desain Topi yang Sederhana Desain topi kasual yang keren membuat topi ini sangat cocok untuk digunakan. Menambah keren penampilan kasual Anda sekaligus melindungi kepala Anda.  Material Kain Berkualitas Topi dibuat dengan material kain yang baik sehingga kualitasnya tidak akan menurun walaupun selalu terkena sinar matahari setiap hari.', 16500),
('B006', 'Topi Trucker / Topi Band / Topi Baseball /', '55c673306523b7c46d9d55b2a8f27274.jpg', 'Condition: New Fabric: Lotto Tetap tampil keren dengan memakai topi koleksi dari ELJANA Custom . bisa menjadi pilihan tepat untuk menemani setiap aktivitas. Cocok untuk melengkapi gaya kasual harian anda.', 17900),
('B007', 'Chino Shorts', 'images (1).jpeg', '- Finely brushed cotton twill fabric With a Special dye and wash process creates a Distinctive texture. , - comfortable and soft ', 65000),
('B008', 'Casual Stretchy Chino Shorts Signature Navy - Giordano South Africa', 'Untitleddesign_4_9ea9feb3-4375-469e-b91a-17481783e3bf_900x.webp', 'Mid-low rise. Zip fly,botton closure. YKK Zipper. Slant pockets at front and at back. Rear right patch pocket with contrast design. Quality blend fabric of cotton and lycra. Slim fitting. Thin thickness.', 74999),
('B009', 'Celana Pendek Uniqlo, Fesyen Pria, Pakaian , Bawahan di Carousell', 'celana_pendek_uniqlo_1638171283_05d65bd4_progressive.jpg', 'Description: - preloved  - celana pendek pria  - bahan katun - modis - LP : 66-80cm - Panjang : 40cm', 30000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
