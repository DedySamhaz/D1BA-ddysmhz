<?php
	include 'koneksi.php';
    include 'header.php';
?>

<?php
$per_hal = 9;
$jumlah_record = mysqli_query($koneksi, "SELECT * from produk");
$jum = mysqli_num_rows($jumlah_record);
$halaman = ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<div id="page-title" style="margin-top: 50px; background: grey;border-bottom: 5px solid grey;">
            <div class="dropdown">
    <h2 class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="cursor: pointer;margin-left: 20px;"><i class="ico-briefcase ico-white"></i>Produk<span class="caret"></span></h2>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="menuitem" tabindex="-1" href="#"><a role="menuitem" tabindex="-1">Kategori</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Pakaian</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Kerajinan tangan</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Aksesoris</a></li>
    </ul>
  </div>
        </div>


  <ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s">
<div class="container">
<div class="women_main">
	<div class="box_1">
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		<?php
			if(isset($_GET['cari'])){
				echo '<div> <font size="3">Hasil pencarian produk dengan kata kunci "'. $_GET['cari'] .'". </font></div>';
					$cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
					$produk=mysqli_query($koneksi, "select * from produk where nama like '%$cari%' or harga like '%$cari%'");
					if(mysqli_num_rows($produk) == null){
						echo '<br><div align="center"> <font size="4">Produk yang anda cari tidak ada. </font></div>';
					}
			}else{
			$produk = mysqli_query($koneksi, "SELECT * FROM produk LIMIT $start, $per_hal");
			}
			while($p = mysqli_fetch_array($produk)){
		?>
			<div class="col-md-4 md-col">
							<div class="col-md 7">
								<a href="detail_produk.php?id=<?= $p['id_produk']?>">
							<img src="<?php echo 'admin/gambar/'.$p['gambar']; ?>" width="200" height="230" />
								<div class="top-content">
									<center><h5><a href="detail_produk.php?id=<?= $p['id_produk']?>"><?= $p['nama']?></a></h5>
									<div align="right">	<p><span class="item_price">Rp.<?= ($p['harga'])?></span></p>
		      	</div>			
										<div class="clearfix"></div>
									</div>
									<br>
								</div><br>							
							</div>
		 	
			<?php }?>
				</a>
			</div>
		</div>
	</div>
</div>
</ul>

<br><br>
<ul class="pagination" style="margin-left: 610px;">			
			<?php 
			for($x = 1;$x <= $halaman; $x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>			
	</ul>

<?php
    include 'footer.php';
?>
<style>
.col-md {
    background: white;
    padding: 0.5em;
    border: 1px solid white;
    border-radius: 5px;
}

p{
	margin-right: 110px;	
}

</style>