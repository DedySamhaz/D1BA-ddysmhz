<?php
   require_once('header.php');
?>

<style>
</style>
	<div id="page-title" style="margin-top: 50px; background: grey;border-bottom: 5px solid grey;">
	            <h2 style="margin-left:20px;"><i class="ico-shopping-cart ico-white"></i>Keranjang</h2>
	        </div>
	    

  <div class="container">
	<div class="check">	 
		<div class="col-md-9 cart-items" style="margin-top: -40px;">
                    <ul class="back" style="text-align: center;">
                	  <li style="font-size: 16px; margin-left: -13px;"><i class="back_arrow"> </i>Pesan lagi di<a href="produk.php" style="color: purple;"> Halaman Produk</a></li>
                    </ul>
			            
                        <?php
                $total = 0;
                if (isset($_SESSION['items'])) {
                    foreach ($_SESSION['items'] as $key => $val) {
                        $query = mysqli_query($koneksi, "select * from produk where id_produk = '$key'");
                        $data = mysqli_fetch_array($query);
                        $jumlah_harga = $data['harga'] * $val;
                        $total += $jumlah_harga;
                        $produk = $data['id_produk'];
                        $jumlah = $val;
                        if (isset($_SESSION['username'])) {
                            $id_user = $_SESSION['id_users'];
                            $nama = $_SESSION['nama'];
                        }
                        ?>
			 <div class="cart-header">
                             <a onclick="if(confirm('Apakah anda yakin ingin menghapus pesanan ini ??')){ 
                             	location.href='tambahkanbarang.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php';}"><div class="close1"> </div></a>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
                                                    <img src="admin/gambar/<?=$data['gambar']?>" class="img-responsive" alt="" style="height: 190px; width: 170px;"/>
						</div>
					   <div class="cart-item-info">
                                               <h3><a href="detail_produk.php?id=<?=$data['id_barang']?>"><h3><?=$data['nama']?></h3></a><span><h4>
                                               	<?=$data['deskripsi']?></h4></span></h3>
						<ul class="qty">
							<li><h3>Jumlah : <?=$jumlah?></h3></li>
                                                        <li><a href="tambahkanbarang.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-danger'><span class="glyphicon glyphicon-minus"></span> </a></li>
                                                        <li><a href="tambahkanbarang.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-success'><span class="glyphicon glyphicon-plus"></span></a></li>
						</ul>	
						<div class="delivery">
                                                    <h3><p> Rp. <?= number_format($jumlah_harga, 2, ",", ".")?></p></h3>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>	
                         <?php
                        }
                    }
                  ?>
		 </div>
		 <div class="col-md-5 cart-total">
				 <div class="price-details" style="font-size: 20px;">
				 <h3>Detail Harga</h3>
				 <span>Total</span>
                                 <span class="total1">Rp. <?= number_format($total, 2, ",", ".")?></span>
				 <span>Diskon</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4 style="font-size: 15px;">TOTAL</h4></li>	
                           <li class="last_price"><span style="font-size: 15px;">Rp. <?= number_format($total, 2, ",", ".")?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
		 <a class="continue" href="pembayaran.php?total_harga=<?=$total?>&jumlah=<?=$jumlah?>&id_produk=<?=$produk?>">Continue</a>
			</div>
	 </div>
</div>

<?php
	include 'footer.php';
?>