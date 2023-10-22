<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-list"></span>  Data Pemesanan</h3>
<br/>
<?php
$per_hal=10;
$jumlah_record=mysqli_query($koneksi, "SELECT * from pembelian");
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
			$pil=mysqli_query($koneksi, "select distinct tanggal from pembelian order by tanggal desc");
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
	echo "<center><h4> Data Pembelian Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>ID Pembelian</th>
		<th>ID Produk</th>
		<th>Nama Produk</th>
		<th>Harga Beli</th>
		<th>Jumlah Beli</th>
        <th>Tanggal</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysqli_real_escape_string($koneksi, $_GET['tanggal']);
		$brg=mysqli_query($koneksi, "select * from pembelian where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysqli_query($koneksi, "SELECT pembelian.*, produk.nama, produk.qty AS jumlah
        FROM pembelian 
        JOIN produk ON pembelian.id_produk = produk.id_produk 
        ORDER BY pembelian.tanggal DESC 
        LIMIT $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_pembelian'] ?></td>
			<td><?php echo $b['id_produk'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['harga_beli'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td><?php echo $b['tanggal'] ?></td>
		</tr>
		<?php 
	}
	?>
</table>
<?php include 'footer.php'; ?>