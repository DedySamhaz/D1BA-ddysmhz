<?php 
include 'config.php';
$id=$_POST['id'];	
$judul=$_POST['judul'];
$isi=$_POST['isi'];

$query = mysqli_query($koneksi, "update artikel set judul='$judul', deskripsi='$isi' where id_artikel='$id'");
if($query){
	echo 'Data berhasil Disimpan';;
	echo '<a href="artikel.php">Kembali</a>';
	header("location: artikel.php");
}else{
	echo 'Data gagal disimpan';
	header("location: edit_artikel.php");
}
?>