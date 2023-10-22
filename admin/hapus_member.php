<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($koneksi, "delete from user where id_user='$id'");
header("location:data_member.php");

 ?>