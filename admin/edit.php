<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($koneksi, $_GET['id']);
$det=mysqli_query($koneksi, "select * from produk where id_produk='$id_brg'")or die(mysql_error());
$d=mysqli_fetch_array($det);
?>					
	<form action="update.php" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id_produk'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select class="form-control" name="kategori">
					<?php
						$query = mysqli_query($koneksi, "SELECT * FROM kategori");
						while($q = mysqli_fetch_array($query)){
						echo '<option>'. $q['nama_kategori'] .'</option>';		
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="qty" value="<?php echo $d['qty'] ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><textarea class="form-control" name="deskripsi"><?php echo $d['deskripsi'] ?></textarea>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
					<img src="gambar/<?= $d['gambar']?>" width="500" height="210"><br/>
					<input type="file" class="form-control" name="gambar" value="<?php echo $d['gambar'] ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php include 'footer.php'; ?>