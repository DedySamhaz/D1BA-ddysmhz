<?php
    ob_start();
    include 'header.php';
    if(!isset($_SESSION['masuk'])){
        echo "<script>alert('Silahkan Login terlebih dahulu untuk melakukan pemesanan')</script>";
    header("location: login.php");
}

$id_produk = $_GET['id_produk'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_array($query);
$stock = $_GET['jumlah'];
if (!isset($_SESSION['masuk'])) {
    echo "<script>alert('Anda harus login untuk memesan produk ini!'); window.location = 'login.php'</script>";
} elseif ($stock > $data['qty']) {
    echo "<script>alert('Jumlah melebihi stock!'); window.location = 'keranjang.php?kd=$id_produk'</script>";
} elseif (!isset($_GET['total_harga'])) {
    echo "<script>alert('Anda belum memilih produk!'); window.location = 'produk.php'</script>";
} else {
    $id_user = $_SESSION['id_users'];
}   
?>


<style>
    .hero-unit {
    background: #fff url(img/bg-k10.png);
    padding: 13px 13px 13px 15px;
    margin: 20px auto;
    -webkit-border-radius: 0px;
     -moz-border-radius: 0px;
     border-radius: 0px;
    font-size: 14px !important;
}
.unit{
    padding: 13px 13px 13px 15px;
    -webkit-border-radius: 0px;
     -moz-border-radius: 0px;
     border-radius: 0px;
     font-style: italic;
}
</style>

<?php
    if(isset($_SESSION['masuk'])){
        $id_user = $_SESSION['id_users'];
    }
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'") or die(mysqli_error($koneksi));
    $p = mysqli_fetch_array($user);
?>
<div id="wrapper">
    <div class="container">
        <div class="table-responsive">
            <div class="title"><h3 style="margin-top: 70px;">Form Checkout</h3></div>
            <div class="hero-unit">
               <div class="unit"> Harap isi form ini sesuai dengan tujuan pengiriman</div>
            <div class="unit">Total Belanja Anda Rp. <?php echo number_format($_GET['total_harga']); ?>,00</div> 
            <form id="formku" action="bukti.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="total_harga" value="<?php echo abs((int) $_GET['total_harga']); ?>">
                        <input type="hidden" name="id_produk" value="<?php echo $_GET['id_produk'] ?>">
                        <input type="hidden" name="jumlah" value="<?php echo $_GET['jumlah'] ?>">
                       
                <div class="cont">
                    <span> Nama</span>
                    <input type="text" name="nama" value="<?php echo $_SESSION['nama']?>">
                    <span>Email</span>
                    <input type="text" name="email" value="<?= $p['email'] ?>">
                    <span>Alamat Lengkap</span>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat lengkap Anda disini">
                    <span>NO HP</span>
                    <input type="text" name="nohp" placeholder="Masukkan No HP Anda" >
                <a href="index.php" class="btn btn-sm btn-primary" style="background: #4CAF50; margin-top: 10px;">Kembali</a>
                <input type="submit" value="Pesan Sekarang" name="finish" style="background: #4CAF50; margin-top: 10PX;" class="btn btn-sm btn-primary"/>
                </div>
            </form>
        </div>
    </div>  
</div>
</div>      
<style>
 .cont {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

</style>
<?php
    include 'footer.php';
?>