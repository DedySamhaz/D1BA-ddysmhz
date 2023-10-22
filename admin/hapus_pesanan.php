<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from penjualan where id_pemesanan='$id'");
header("location:data_pemesanan.php");

?>