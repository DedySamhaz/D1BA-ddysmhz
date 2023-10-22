<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from produk where id_produk='$id'");
header("location:barang.php");

?>