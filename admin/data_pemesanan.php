<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-list"></span>  Data Pemesanan</h3>
<br/>
<?php
$per_hal=10;
$jumlah_record=mysqli_query($koneksi, "SELECT * from penjualan");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<button = style="margin-bottom:10px" onClick="print_data()" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</button> 
</div>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysqli_query($koneksi, "select distinct tanggal from penjualan order by tanggal desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div><br>

</form>

<?php

if(isset($_GET['tanggal'])){
	echo "<center><h4> Data Pemesanan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>ID User</th>
		<th>ID Produk</th>
		<th>Tanggal</th>
		<th>Opsi</th>			
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysqli_real_escape_string($koneksi, $_GET['tanggal']);
		$brg=mysqli_query($koneksi, "select * from penjualan where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysqli_query($koneksi, "select * from penjualan order by tanggal desc limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_user'] ?></td>
			<td><?php echo $b['id_produk'] ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td>
			<a href="det_pemesanan.php?id=<?php echo $b['id_pemesanan']; ?>" class="btn btn-info">Detail</a>	
			<a href="hapus_pesanan.php?id=<?php echo $b['id_pemesanan']; ?>" style="background:  #c9302c; border-color:  #c9302c;" class="btn btn-info">Hapus</a>	
			
			</td>
		</tr>

		<?php 
	}
	?>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>

	<script>
		function print_data() {
		<?php
			if (isset($tanggal)) {?>
				window.open("laporan_pemesanan.php?tanggal=<?php echo $tanggal ?>","_blank");
			<?php }else{?>
				window.open("laporan_pemesanan.php","_blank");
			<?php } ?>
		}
	</script>
<?php include 'footer.php'; ?>