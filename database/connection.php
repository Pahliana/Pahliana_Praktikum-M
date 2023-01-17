<?php
$servername = "localhost";
$username = "root";
$passwoard = "";
$dbname = "penggajian";

$connection = mysqli_connect($servername,$username,$passwoard,$dbname);
if(!$connection){
    die("Gagal Koneksi: ". mysqli_connect_error());
}
?>