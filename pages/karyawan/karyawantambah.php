<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Karyawan</h3>
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
        if(isset($_POST["simpan_button"])){
            $nik = $_POST["nik"];
            $nama = $_POST["nama"];
            $tanggal_mulai = $_POST["tanggal_mulai"];
            $gaji_pokok = $_POST["gaji_pokok"];
            $status_karyawan = $_POST["status_karyawan"];
            $bagian_id = $_POST["bagian_id"];

            $sudah_ada = false;

            $check_sql= "SELECT * FROM karyawan WHERE nik='$nik'";
            $result_check = mysqli_query($connection, $check_sql);
            if(mysqli_num_rows($result_check) > 0){
                $sudah_ada = true;
            }
            if($sudah_ada){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-circle"></i>
                        Nik Sudah Ada
                    </div>
                <?php
            }else{
                $insert_sql = "INSERT INTO karyawan SET 
                nik='$nik',
                nama='$nama',
                tanggal_mulai='$tanggal_mulai',
                gaji_pokok= $gaji_pokok,
                status_karyawan='$status_karyawan',
                bagian_id=$bagian_id";
                $result = mysqli_query($connection,$insert_sql);
                if(!$result){
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-exclamation-circle"></i>
                            <?php echo mysqli_error($connection) ?>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check-circle"></i>
                           Data Berhasil Di Upload
                        </div>
                    <?php
                }
            } 
        }
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Masukkan Tanggal Mulai" required>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Masukkan Gaji Pokok" required>
            </div>
            <label class="form-label">Status Karyawan</label>
            <div class="mb-3">
                <input type="radio" class="form-check-input" name="status_karyawan" id="TETAP" value="TETAP" required>
                <label for="TETAP" class="form-label">Tetap</label>
            </div>
            <div class="mb-3">
                <input type="radio" class="form-check-input" name="status_karyawan" id="KONTRAK" value="KONTRAK">
                <label for="KONTRAK" class="form-label">Kontrak</label>
            </div>
            <div class="mb-3">
                <input type="radio" class="form-check-input" name="status_karyawan" id="MAGANG" value="MAGANG">
                <label for="MAGANG" class="form-label">Magang</label>
            </div>
            <div class="mb-3">
                <label for="bagian_id" class="form-label">Bagian</label>
                <?php
                $select_sql = "SELECT * FROM bagian";
                $result = mysqli_query($connection, $select_sql);
                if (!$result) {
                    ?>
                       <alert class="alert alert-danger" role="alert">
                          <?php echo mysqli_error($connection) ?>
                       </alert>
                    <?php
                       return;
                    }
                if (mysqli_num_rows($result) == 0) {
                        ?>
                           <alert class="alert alert-light" role="alert">
                           <?= "Data Kosong" ?>
                           </alert>
                        <?php
                           return;
                    }
                ?>
                <select class="form-select" name="bagian_id" id="bagian_id">
                <option value="" selected> -- Pilih Bagian -- </option>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                     <option value="<?php echo $row["id"] ?>"><?= $row["nama"] ?></option>
                  <?php
                  }
                  ?>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit" name="simpan_button">
                    <i class="fa fa-save"></i>
                    Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
