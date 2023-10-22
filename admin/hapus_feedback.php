<?php 
include 'config.php';
$id=$_GET['id'];
$status = 'Rejected';
//mysqli_query($koneksi, "UPDATE komentar SET status = '$status' WHERE id_komentar = '$id'") or die(mysqli_error($koneksi));
mysqli_query($koneksi, "delete from komentar where id_komentar='$id'");
header("location:feedback.php");

 ?>