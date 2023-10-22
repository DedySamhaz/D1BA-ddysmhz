<?php 
include 'header.php'; 
include 'config.php';
?>

<h3><span class="glyphicon glyphicon-list"></span> Data Pembelian dan Penjualan</h3>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysqli_query($koneksi, "SELECT * from produk");
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
</div>
	<?php 
	if(isset($_GET['cari'])){
		echo '<div> <b>Hasil pencarian dengan kata kunci "'. $_GET['cari'] .'"</b></div><br/>';
		$brg=mysqli_query($koneksi, "select * from produk inner join kategori on produk.id_kategori = kategori.id_kategori where nama like '%$cari%' or qty like '%$cari%' or id_barangk like '%$cari%'");
	}else{
		$brg=mysqli_query($koneksi, "SELECT
        p.id_produk,
        p.nama,
		p.qty,
		penjualan.jumlah AS terjual,
        SUM(penjualan.total_harga * penjualan.jumlah)  AS harga_total_jual,
        SUM(pembelian.harga_beli * p.qty)  AS harga_total_beli, 
		(SUM(penjualan.total_harga * penjualan.jumlah) - SUM(pembelian.harga_beli * p.qty)) AS laba_rugi
    FROM
        produk AS p
    LEFT JOIN penjualan ON p.id_produk = penjualan.id_produk
    LEFT JOIN pembelian ON p.id_produk = pembelian.id_produk
    GROUP BY
        p.id_produk, p.qty, p.nama");		
	}
	$no=1;
	$count = mysqli_num_rows($brg);
	if($count == null){
		if(isset($_GET['cari'])){
			echo '<div align="center"> <h5>Barang dengan kata kunci "'. $_GET['cari'] .'" tidak ada. </h5> </div>';
		}
	}else{
	?>
		<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">ID Produk</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-1">Terjual /pcs</th>
		<th class="col-md-1">Stock /pcs</th>
		<th class="col-md-2">Harga Total Jual</th>
		<th class="col-md-1">Harga Total Beli</th>
		<th class="col-md-2">Laba/Rugi </th>
	</tr>

	<?php
	while($b=mysqli_fetch_array($brg)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_produk'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['terjual'] ?></td>
			<td><?php echo $b['qty'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_total_jual']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['harga_total_beli']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['laba_rugi']) ?>,-</td>
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
<?php
	}
	?>
<?php 
include 'footer.php';

?>