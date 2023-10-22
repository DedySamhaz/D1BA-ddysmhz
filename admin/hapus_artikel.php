<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from artikel where id_artikel='$id'");
header("location:artikel.php");

 ?>