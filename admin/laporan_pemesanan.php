<?php
	require_once 'config.php';
	$data = mysqli_query($koneksi, "SELECT * FROM penjualan");
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
			<th rowspan="1">ID Pemesanan</th>
			<th>ID Users</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>No HP</th>
			<th>ID Produk</th>
			<th>Jumlah</th>
			<th>Total Harga</th>
		</tr>
		<?php

		if(isset($_GET['tanggal'])){
			$tanggal=mysqli_real_escape_string($koneksi, $_GET['tanggal']);
			$data=mysqli_query($koneksi, "select * from penjualan where tanggal like '$tanggal' order by tanggal desc");
		}else{
			$data=mysqli_query($koneksi, "select * from penjualan");
		}
			while ($hasil = mysqli_fetch_array($data)) {
					$id_user = $hasil['id_user'];
					$user=mysqli_query($koneksi, "Select * from User where id_user = $id_user");
					$t=mysqli_fetch_array($user);
				?>
			<?php
				if (isset($tanggal)) {	
			?>
				<tr>
				Tanggal: <?php echo $tanggal;
				}else{}?>
				</tr>
				<tr id="rowHover">
					<td width="10%" align="center"><?php echo $hasil['id_pemesanan']?></td>
					<td width="10%" align="center"><?php echo $hasil['id_user']?></td>
					<td width="15%"><?php echo $t['nama']?></td>
					<td width="15%"><?php echo $t['alamat']?></td>
					<td width="15%"><?php echo $t['email']?></td>
					<td width="10%"><?php echo $t['nohp']?></td>
					<td width="10%" align="center"><?php echo $hasil['id_produk']?></td>
					<td width="5%" align="center"><?php echo $hasil['jumlah']?></td>
					<td width="10%" align="center">Rp <?php echo number_format($hasil['total_harga'])?>,-</td>
					<td>
				</tr>	
		<?php		
			}
		?>
		<tr>
			<td colspan="8">Total Penjualan</td>
			<td>			
				<?php
					if (isset($_GET['tanggal'])) {
						$x=mysqli_query($koneksi, "SELECT sum(total_harga) as total from penjualan WHERE tanggal = '$tanggal'");			
					}else{		
						$x=mysqli_query($koneksi, "SELECT sum(total_harga) as total from penjualan");
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