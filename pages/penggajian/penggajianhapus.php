<?php
$id = $_GET["id"];
$bulan = $_GET["bulan"];
$tahun = $_GET["tahun"];
?>
<div id="top" class="row mb-3">
    <div class="col">
        <h3>Hapus Data Penggajian</h3>
    </div>
    <div class="col">
        <a href="?page=penggajian&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";
        $id = $_GET["id"];
        $delete_sql = "DELETE FROM penggajian WHERE id = $id";
        $result = mysqli_query($connection, $delete_sql);
        if(!$result){
            ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                   <?= mysqli_error($connection) ?>
            </div>
        <meta http-equiv="refresh" content="2;url=?page=bagian">
        <?php
        }else{
        ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i>
                   Data Berhasil Di Delete
            </div>
        <meta http-equiv="refresh" content="2;url=?page=penggajian&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>">
        <?php
        }
        ?>
    </div>
</div>