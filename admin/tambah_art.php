<?php
	include 'header.php';
?>

<h3><span class="glyphicon glyphicon-plus"></span>Tambah Artikel</h3>

				<form action="tambah_artikel.php" method="post">
					<div class="form-group">
						<label>Judul Artikel</label>
						<input name="judul" type="text" class="form-control" placeholder="Judul Artikel">
					</div>
					<div class="form-group">
						<label>Isi Artikel</label>
						<input name="isi" type="textarea" class="form-control" placeholder="Isi Artikel">
					</div>
					<input type="submit" class="btn btn-primary" value="Simpan">
					<a href="artikel.php" type="button" class="btn btn-default" data-dismiss="modal">Batal</a>
			</form>