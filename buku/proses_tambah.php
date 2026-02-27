<?php
include("../koneksi.php");

$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$isbn = $_POST['isbn'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$stok = $_POST['stok'];
$kategori_id = $_POST['kategori_id'];
$penerbit_id = $_POST['penerbit_id'];
$cover = $_FILES['cover']['name'];
$tmp_cover = $_FILES['cover']['tmp_name'];

$query = "INSERT INTO buku (judul_buku,pengarang,tahun_terbit,isbn,jumlah_halaman,stok,kategoris_id,penerbits_id,cover) 
VALUES ('$judul_buku', '$pengarang', '$tahun_terbit', '$isbn', '$jumlah_halaman', '$stok', '$kategori_id', '$penerbit_id', '$cover')";

$tambah = mysqli_query($koneksi, $query);

if($tambah){
    move_uploaded_file($tmp_foto, "../cover/$cover");
    header("location:index.php");
} else {
    echo "Gagal menambahkan data: " . mysqli_error($koneksi);
}
?>