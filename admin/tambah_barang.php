<?php
	include 'header.php';
?>

<h3><span class="glyphicon glyphicon-plus"></span> Tambah Produk</h3>
<br/>
<br/>
				<form action="tmb_brg_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Produk</label>
       					 <input name="nama" type="text" class="form-control" placeholder="Nama Produk ..">
					</div>
					<div class="form-group">
						<label>Harga</label>
        				<input name="harga" type="text" class="form-control" placeholder="Harga Barang ..">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
       					 <input name="qty" type="text" class="form-control" placeholder="Jumlah ..">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
    				    <input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi..">
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="kategori">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kategori");
							while($q = mysqli_fetch_assoc($query)){
							echo '<option>'. $q['nama_kategori'] .'</option>';		
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input name="gambar" type="file" class="form-control">
					</div>
					<input type="submit" class="btn btn-primary" value="Simpan" name="tambah">
					<a href="barang.php" class="btn btn-default" data-dismiss="modal">Batal</a>
			</form>
		<br><br>