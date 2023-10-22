<?php
include('header.php');
?>

<h3> <span class="glyphicon glyphicon-briefcase"></span> Konfirmasi Barang telah Sampai</h3>

<?php
$per_hal = 10;
$jumlah_record = mysqli_query($koneksi, "SELECT * from penjualan");
$jum = mysqli_num_rows($jumlah_record);
$halaman = ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$query = mysqli_query($koneksi, 'SELECT PS.id_pemesanan, P.nama as nama_barang, U.nama as nama_pemesan, PS.jumlah, PS.total_harga, PS.status 
    FROM PRODUK P INNER JOIN (PENJUALAN PS INNER JOIN USERS U ON U.id_user = PS.id_user)
    ON ps.id_produk = p.id_produk 
    ORDER BY ps.id_produk ASC');
?>
<br/>
    <?php
    if(mysqli_num_rows($query) == null){
        echo '<h4 align="center">Belum ada Pemesanan</h4>';
    }else{
    ?>
        <table class="table table-hover">
    <tr>
        <th class="col-md-1">No</th>
        <th class="col-md-3">Pemesan </th>
        <th class="col-md-3">Nama Barang</th>
        <th class="col-md-1">Jumlah</th>
        <th class="col-md-2">Total Harga</th>
        <th class="col-md-2">Status</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $row['id_pemesanan'] ?></td>
            <td><?= $row['nama_pemesan'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['jumlah']?></td>
            <td>Rp. <?= number_format($row['total_harga'])?>,-</td>
            <td><?php
            if ($row['status'] == 'Belum Dikirim') {
                echo '<span style="background-color: #8c8c8c" class="img-rounded">&nbsp; Belum Dikirim &nbsp;</span> <br/>';
                echo '<br><a class="btn btn-default" href="confirm_barang_terkirim.php?id='. $row['id_pemesanan'] .'"> Konfirmasi </a>';
            } else if($row['status'] == 'Telah Dikirim'){
                echo '<span style="background-color: #248f24; color: white" class="img-rounded">&nbsp; Telah Dikirim &nbsp;</span>';
            }else if($row['status'] == 'Telah Sampai'){
                echo '<span style="background-color: #1a1aff; color: white" class="img-rounded">&nbsp; Telah Sampai &nbsp;</span>';
            }else if($row['status'] == 'Belum Sampai'){
                echo '<span style="background-color: #ff1a1a; color: white" class="img-rounded">&nbsp; Belum Sampai &nbsp;</span>';
            }
                ?>
            </td>
        </tr>

        <?php
    }
    }
    ?>
</table>