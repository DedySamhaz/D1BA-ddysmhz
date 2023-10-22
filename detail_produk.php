<?php
    include 'header.php';
    $id_produk = $_GET['id'];
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'") or die(mysqli_error($koneksi));
    $p = mysqli_fetch_array($produk);
?>
<div class="single_top">
	 <div class="container">
         <div class="single_grid">
              <nav arial-label="breadcrumb" style="margin-top: 30px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" style="color: #007bff;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="breadcrumb-item"><a href="produk.php" style="color: #007bff;">Produk</a></li>
                    </ol>
                </nav>
                
             <div class="grid images_3_of_2">
                 <img src="admin/gambar/<?=$p['gambar']?>" width="300" height="270"/>
                 
						 <div class="clearfix"></div>
				  </div> 
				<div class="desc1 span_1_of_3">
                    <h1><?php echo $p['nama']?></h1>
                    <p>Deskripsi : <?=$p['deskripsi']?></p>
                     <form action="tambahkanbarang.php?act=add&amp;barang_id=<?php echo $p['id_produk'];?>&amp;ref=keranjang.php?kd=<?php echo $p['id_produk'];?>" method="POST">
                     <div class="simpleCart_shelfItem">
                        <div class="price_single">
                                            <div class="head"><h3>Rp. <?= number_format($p['harga'])?>,-</h3></div>
                           <div class="clearfix"></div>
                         </div>
                             <table class="table">
                            <tr>
                                <td width="40">Jumlah</td>
                                <td><input type="number" name="jumlah" class="form-control input-sm" min="1" max="<?php echo $data['qty']; ?>" style="width: 100px;" value="1"></td>
                            </tr>
                        </table>
                            <button value="Tambahkan ke Keranjang"><span class="glyphicon glyphicon-shopping-cart"></span> Tambahkan kekeranjang</button>
                     </div>
                     </form>
                </div>
                <div class="clearfix"></div>
               </div>
              </div>
</div>


<!--           	  	Baru,masukkan disini komentar nya -->
<div class="container" style="margin-right: 195px;">
<div class="col-md-9 contact_left">
    <form action="komentar_proses.php?id=<?=$id_produk?>" method="post">
					<div class="column_3">
	                   <textarea value="Message" style="font-size: 20px; border-radius: 8px; height: 170px;" name="komentar" placeholder="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukkan komentar anda tentang produk ini';}">Masukkan feedback anda tentang produk ini</textarea>
	                </div>
	                <div class="form-submit1">
			          <input type="submit" value="Kirim">
					</div>
					<div class="clearfix"> </div>
				  </form>
</div>
<div class="col-md-3 contact_right">
    <div class="clearfix"></div>
</div>
    <div class="col-md-6 box_4">
        <?php
            $komen = mysqli_query($koneksi, "SELECT * FROM komentar  WHERE id_produk = '$id_produk' ORDER BY id_komentar DESC") or die(mysqli_error($koneksi));
            while($k = mysqli_fetch_array($komen)){
                $id_user = $k['id_user'];
        ?>
        
                    <?php
                        $user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
                        while($u = mysqli_fetch_array($user)){
                    ?>
			<h4><?=$u['nama']?>&nbsp;|&nbsp;<?=$k['tanggal']?></h4>
                        <p><?= $k['komentar']?></p>
                        <div class="clearfix"></div>
                        <?php
                        }
                        ?>
                        <div class="clearfix"></div>
        <?php
            }
        ?>
    </div>
</div>
<style>
    .form-submit1 input[type="submit"] {
    background: #45a049;
}
</style>
<?php
    include 'footer.php';
?>
