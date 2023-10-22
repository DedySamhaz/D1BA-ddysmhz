<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);


$det=mysqli_query($koneksi, "select * from produk where id_produk='$id_brg'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>ID Produk</td>
			<td><?php echo $d['id_produk'] ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo number_format($d['qty']) ?></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td><?php echo $d['deskripsi']; ?></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td><img src="gambar/<?php echo $d['gambar'];?>"style="width:500px;"/></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>