<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pemesanan</h3>
<a class="btn" href="data_pemesanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_pemesanan=mysqli_real_escape_string($koneksi, $_GET['id']);


$det=mysqli_query($koneksi, "select * from penjualan where id_pemesanan='$id_pemesanan'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
			<?php
			$id_user = $d['id_user'];
			$user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'") or die(mysqli_error($koneksi));
			$u = mysqli_fetch_assoc($user);
		?>
		<tr>
			<td>Nama Pemesan</td>
			<td><?php echo $u['nama'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $u['email'] ?></td>
		</tr>
		
		<?php
			$user = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_pemesanan = '$id_pemesanan'") or die(mysqli_error($koneksi));
			$u = mysqli_fetch_assoc($user);
		?>
			<tr>
			<td>Alamat</td>
			<td><?php echo $u['alamat'] ?></td>
		</tr>
		<tr>
			<td>NO HP</td>
			<td><?php echo $u['nohp'] ?></td>
		</tr>
		<tr>
			<td>Nama Produk</td>
			<td><?php
				$id_produk = $d['id_produk'];
				$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'") or die(mysqli_error($koneksi));
				$p = mysqli_fetch_assoc($produk);
				echo $p['nama']; 
			?></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['total_harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $d['status']?></td>
		</tr>
		<tr>
			<td>Bukti Pembayaran</td>
			<td><a href="det_gambar.php?id_pemesanan=<?php echo $d['id_pemesanan']?>&bukti_pembayaran=<?php echo $d['bukti_pembayaran'] ?>"><img src="<?php echo '../'.$d['bukti_pembayaran'];?>"style="width:330px;"/></a></td>
		</tr>
		<?php
			if($d['status'] == 'Belum Dikirim'){
		?>
		<tr>
			<td></td>
			<td><a class="btn btn-default" href="confirm_barang_terkirim.php?id=<?= $d['id_pemesanan']?>"> Konfirmasi </a></td>
		<tr/>
		<?php
			}
		?>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>