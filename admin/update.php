<?php 
include 'config.php';
$id=$_POST['id'];	
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['qty'];
$deskripsi=$_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];

if ($_FILES['gambar']['name']) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'. $gambar);
}

$query = mysqli_query($koneksi, "update produk set nama='$nama', harga='$harga', qty='$jumlah', deskripsi='$deskripsi', gambar='$gambar' where id_produk='$id'");
if($query){
	echo "<script>alert('Data $nama berhasil disimpan!'); window.location = 'barang.php'</script>";
}else{
	echo "<script>alert('Data $nama gagal disimpan!'); window.location = 'barang.php'</script>";
}
?>