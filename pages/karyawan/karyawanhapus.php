<div id="top" class="row mb-3">
    <div class="col">
        <h3>Hapus Data Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";
        $nik = $_GET["nik"];
        $delete_sql = "DELETE FROM karyawan WHERE nik = $nik";
        $result = mysqli_query($connection, $delete_sql);
        if(!$result){
            ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                   <?= mysqli_error($connection) ?>
            </div>
        <meta http-equiv="refresh" content="2;url=?page=karyawan">
        <?php
        }else{
        ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i>
                   Data Berhasil Di Delete
            </div>
        <meta http-equiv="refresh" content="2;url=?page=karyawan">
        <?php
        }
        ?>
    </div>
</div>