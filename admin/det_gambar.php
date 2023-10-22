<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Bukti Pembayaran</h3>
<a class="btn" href="data_pemesanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_pemesanan=mysqli_real_escape_string($koneksi, $_GET['id_pemesanan']);


$det=mysqli_query($koneksi, "select * from penjualan where id_pemesanan='$id_pemesanan'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Bukti Pembayaran</td>
			<td><img src="<?php echo '../'.$d['bukti_pembayaran'];?>"style="width:500px;"/></a></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>