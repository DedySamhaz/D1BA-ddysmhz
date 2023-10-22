-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2023 pada 23.37
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lake_toba_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `deskripsi`) VALUES
(1, 'Apa itu ulos?', 'Ulos atau sering juga disebut kain ulos adalah salah satu busana khas Indonesia. Ulos secara turun temurun dikembangkan oleh masyarakat Batak, Sumatera utara. Dari bahasa asalnya, ulos berarti kain. Cara membuat ulos serupa dengan cara membuat songket khas Palembang, yaitu menggunakan alat tenun bukan mesin.  Warna dominan pada ulos adalah merah, hitam, dan putih yang dihiasi oleh ragam tenunan dari benang emas atau perak. Mulanya ulos dikenakan di dalam bentuk selendang atau sarung saja, kerap digunakan pada perhelatan resmi atau upacara adat Batak, namun kini banyak dijumpai di dalam bentuk produk sovenir, sarung bantal, ikat pinggang, tas, pakaian, alas meja, dasi, dompet, dan gorden.  Ulos juga kadang-kadang diberikan kepada sang ibu yang sedang mengandung supaya mempermudah lahirnya sang bayi ke dunia dan untuk melindungi ibu dari segala mara bahaya yang mengancam saat proses persalinan.'),
(1, 'Apa itu ulos?', 'Ulos atau sering juga disebut kain ulos adalah salah satu busana khas Indonesia. Ulos secara turun temurun dikembangkan oleh masyarakat Batak, Sumatera utara. Dari bahasa asalnya, ulos berarti kain. Cara membuat ulos serupa dengan cara membuat songket khas Palembang, yaitu menggunakan alat tenun bukan mesin.  Warna dominan pada ulos adalah merah, hitam, dan putih yang dihiasi oleh ragam tenunan dari benang emas atau perak. Mulanya ulos dikenakan di dalam bentuk selendang atau sarung saja, kerap digunakan pada perhelatan resmi atau upacara adat Batak, namun kini banyak dijumpai di dalam bentuk produk sovenir, sarung bantal, ikat pinggang, tas, pakaian, alas meja, dasi, dompet, dan gorden.  Ulos juga kadang-kadang diberikan kepada sang ibu yang sedang mengandung supaya mempermudah lahirnya sang bayi ke dunia dan untuk melindungi ibu dari segala mara bahaya yang mengancam saat proses persalinan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sadum'),
(2, 'Mangiring'),
(3, 'Ragi Hotang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(15) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_produk`, `harga_beli`, `tanggal`) VALUES
(2, 15, 300000, '2023-10-21'),
(7, 16, 350000, '2023-10-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_pemesanan`, `id_user`, `id_produk`, `jumlah`, `total_harga`, `alamat`, `nohp`, `bukti_pembayaran`, `tanggal`, `status`) VALUES
(1, 4, 15, 1, 400000, 'Pakkat', '0822670104004', 'pembayaran/Ulos Mangiring.jpg', '2023-10-15', 'Telah Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(9) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(45) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `qty`, `deskripsi`, `gambar`, `id_kategori`) VALUES
(15, 'Ulos Mangiring', 400000, 8, 'Barang masih baru', 'images (4).jpg', 2),
(16, 'Ragi Huting', 400000, 5, 'Baruu', 'ragihuting.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(3) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `email`, `nohp`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'jln. siliwangi doloksanggul', 'admin@gmail.com', '082277990123', 'admin', 'admin', 1),
(4, 'Sultan Dedy', 'Pakkat', 'sultandedy@gamil.com', '0822670104004', 'ddysss', 'ddy1223', 2),
(7, 'Dedy', 'Jakpups', 'dedy.pardede@binus.ac.id', '9282494129', 'ddysmhz', 'test123', 2),
(8, 'ddy', 'disini', 'ddys@gmail.com', '28282', 'ddyy', 'test123', 2),
(9, 'smhz', 'disini', 'smhz@gmamal.com', '124194129', 'smmhz', 'test123', 2),
(10, 'ssmmz', 'disini', 'dmsmsm@gmail.com', '2941941', 'smmzz', 'test123', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_userFK` (`id_user`),
  ADD KEY ` Kesalahan membuat kunci asing pada id_produk (periksa tipe data` (`id_produk`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `modal` (`id_produk`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_user`,`id_produk`),
  ADD KEY `id_user_FK` (`id_user`),
  ADD KEY `id_produkFK` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategoriFK` (`id_kategori`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_roleFK` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT ` Kesalahan membuat kunci asing pada id_produk (periksa tipe data` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `id_userFK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `modal` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `id_produkFK` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `id_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `id_kategoriFK` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_roleFK` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
