<div id="top" class="row mb-3">
    <div class="col">
        <h3>Ubah Data Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagian" class="btn btn-primary float-end">
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
            $id = $_POST["id"];
            $nama = $_POST["nama"];

            $check_sql = "SELECT * FROM bagian WHERE nama='$nama' AND id!=$id";
            $result = mysqli_query($connection,$check_sql);
            if(mysqli_num_rows($result) > 0){
            ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama Bagian Sama Sudah Ada
                </div>
            <?php
            }else{
                $update_sql = "UPDATE bagian SET nama ='$nama' WHERE id=$id";
                $result = mysqli_query($connection,$update_sql);
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
                           Data Berhasil Di Update
                        </div>
                    <?php
                }
            }
                
        }

        $id = $_GET["id"];

        $find_sql= "SELECT * FROM bagian WHERE id=$id";
        $result =mysqli_query($connection, $find_sql);
        if(!$result || mysqli_num_rows($result)==0){
        ?>
            <meta http-equiv="refresh" content="2;url=?page=bagian">
        <?php
        }
            $row = mysqli_fetch_assoc($result);
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?= $id?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Bagian</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" placeholder="Masukkan Nama Bagian" required>
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