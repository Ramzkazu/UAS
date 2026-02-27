<?php 
#1. koneksi
include_once("../koneksi.php");

#2. cek id
if(!isset($_GET['id'])){
    die("ID tidak ditemukan!");
}

#3. ID hapus (amankan)
$idhapus = intval($_GET['id']);

#4. menulis query
$qry = "DELETE FROM penerbit WHERE id='$idhapus'";

#5. menjalankan query
$hapus = mysqli_query($koneksi, $qry);

#6. cek sukses / gagal
if(!$hapus){
    die("Data gagal dihapus: " . mysqli_error($koneksi));
}

#7. mengalihkan halaman
header("Location: index.php");
exit;
?>