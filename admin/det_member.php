<?php 
include 'header.php';
?>

<h3>  Detail Member</h3>
<a class="btn" href="data_member.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_mem=mysqli_real_escape_string($koneksi, $_GET['id']);


$mem=mysqli_query($koneksi, "select * from user where id_user='$id_mem'")or die(mysqli_error($koneksi));
while($m=mysqli_fetch_array($mem)){
	?>					
	<table class="table" border="2px">
		<tr>
			<td>Username</td>
			<td><?php echo $m['username'] ?></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><?php echo $m['nama'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $m['alamat'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $m['email'] ?></td>
		</tr>
		<tr>
			<td>NO HP</td>
			<td><?php echo $m['nohp']; ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>