<?php
	require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/pdf.css">
</head>
<body>
	<table>
		<tr class="tableheader">
			<th rowspan="1">ID Produk</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Keterangan</th>
		</tr>
		<?php
		if (isset($_GET['barang'])) {
			$cari = mysqli_real_escape_string($koneksi, $_GET['barang']);
			$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama = '$cari' order by nama");
		}else{
			$data = mysqli_query($koneksi, "SELECT * FROM produk");
		}
			while ($hasil = mysqli_fetch_array($data)) {?>
				<tr id="rowHover">
					<td width="10%" align="center"><?php echo $hasil['id_produk']?></td>
					<td width="25%" align="center"><?php echo $hasil['nama']?></td>
					<td width="15%" align="center">Rp <?php echo number_format($hasil['harga'])?>,-</td>
					<td width="15%" align="center"><?php echo $hasil['qty']?></td>
					<td width="25%" align="center"><?php echo $hasil['deskripsi']?></td>
				</tr>	
		
		<?php		
			}
		?>
		<tr>
			<td colspan="5">Total Modal</td>
			<td>			
				<?php
					if (isset($cari)) {
						$x=mysqli_query($koneksi, "SELECT sum(harga) as total from produk WHERE nama = '$cari'");	
					}else{
						$x=mysqli_query($koneksi, "SELECT sum(harga) as total from produk");
					}	
					$xx=mysqli_fetch_array($x);			
					echo "<b> Rp.". number_format($xx['total']).",-</b>";		
				?>
			</td>
		</tr>	

	</table>
	<script>
		window.load = print_data();
		function print_data(){
			window.print();
		}
	</script>
</body>
</html>