<?php 
include 'config.php';


$nama = $_POST['nama'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$deskripsi = $_POST['deskripsi'];
$nama_kategori = $_POST['kategori'];
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");
$kat = mysqli_fetch_array($kategori);
$id_kategori = $kat['id_kategori'];

		move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'. $gambar);
		
		$sql = mysqli_query($koneksi, "INSERT INTO produk VALUES('', '$nama', '$harga', '$qty', '$deskripsi', '$gambar', '$id_kategori')");
		if ($sql) {
			echo "<script>alert('Data $nama berhasil disimpan!'); window.location = 'barang.php'</script>";	
		}else{
			echo "<script>alert('Data $nama gagal disimpan!'); window.location = 'barang.php'</script>";
	}

?>
	