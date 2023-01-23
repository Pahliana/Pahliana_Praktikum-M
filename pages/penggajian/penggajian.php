<div id="top" class="row mb-3">
    <div class="col">
        <h3>Penggajian</h3>
    </div>
    <div class="col">
        <a href="?page=pilihkaryawanpenggajian" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
                Tambah Data
        </a>
        <a href="?page=pilihbulantahunpenggajian" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
                Kembali
        </a>
    </div>
</div>
<div id="content" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";

        $bulan = $_GET["bulan"];
        $tahun = $_GET["tahun"];
        
        $select_sql = "";
        if ($bulan == "semua") {
            if ($tahun == "semua") {
               $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik";
            } else {
               $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = $tahun";
            }
         } else {
            if ($tahun != "semua") {
               $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = $tahun AND bulan = $bulan";
             }
         }
         $result = mysqli_query($connection, $select_sql);
         if (!$result){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($connection) ?>
            </div>
            <?php
            return;
            }
            if (mysqli_num_rows($result) == 0){
            ?>
            <div class="alert alert-light" role="alert">
                Data Kosong
            </div>
            <?php
                return;
            }
        ?>
        <table class="table bg-white rounded shadow-sm  table-hover">
             <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th class="text-end" scope="col">Gaji Dibayar</th>
                    <th scope="col" width="200">Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr class="align-middle">
                        <td><?php echo $row['karyawan_nik'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['bulan'] ?></td>
                        <td><?php echo $row['tahun'] ?></td>
                        <td class="text-end"><?php echo number_format($row['gaji_bayar']) ?></td>
                        <td> 
                            <a href="?page=penggajianhapus&id=<?=$row["id"]?>&bulan=<?=$bulan?>&tahun=<?=$tahun?>" 
                            onclick= "javascript: return confirm('Hapus Data?');"
                            class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                    Hapus
                            </a>
                        </td>
                    </tr>
                <?php   
                }
            ?>
            </tbody>
        </table>
    </div>
</div>