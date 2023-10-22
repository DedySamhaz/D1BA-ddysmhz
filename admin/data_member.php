<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-user"></span>  Data Anggota</h3><br> 
<?php
$per_hal=10;
$jumlah_record=mysqli_query($koneksi, "SELECT * from user");
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
<table class="table">
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Email</th>			
		<th>Opsi</th>
	</tr>

	<?php 
	$mem=mysqli_query($koneksi, "select * from user where role = 2 limit $start, $per_hal");
	$no=1;
	while($m=mysqli_fetch_array($mem)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $m['id_user'] ?></td>
			<td><?php echo $m['nama'] ?></td>
			<td><?php echo $m['alamat'] ?></td>
			<td><?php echo $m['email'] ?></td>		
			<td>
				<a href="det_member.php?id=<?php echo $m['id_user']; ?>" class="btn btn-info">Detail</a>		
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_member.php?id=<?php echo $m['id_user']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php 
	}
	?>
	</tr>
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

<?php include 'footer.php'; ?>