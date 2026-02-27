<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST['id']; 
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$isbn = $_POST['isbn'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$stok = $_POST['stok'];

$nama_cover = $_FILES['cover']['name'];
$tmp_cover = $_FILES['cover']['tmp_name'];

if($nama_cover != ""){
    # Ambil data lama untuk hapus cover lama
    $qry = "SELECT * FROM buku WHERE id='$id'";
    $hapus_cover = mysqli_query($koneksi, $qry);
    $data = mysqli_fetch_array($hapus_cover);

    // Sesuaikan nama kolom cover di database
    $nama_cover_hapus = $data['cover']; 
    $lokasi_cover = "../cover/$nama_cover_hapus";

    if(file_exists($lokasi_cover)){
        unlink($lokasi_cover); 
    }

    # Move cover baru ke folder cover
    move_uploaded_file($tmp_cover,"../cover/$nama_cover");

    # Query UPDATE dengan cover baru
    $query = "UPDATE buku SET 
        judul_buku='$judul_buku', 
        pengarang='$pengarang', 
        tahun_terbit='$tahun_terbit', 
        isbn='$isbn', 
        jumlah_halaman='$jumlah_halaman', 
        stok='$stok',
        cover='$nama_cover'
        WHERE id='$id'";
} else {
    # Query UPDATE tanpa ubah cover
    $query = "UPDATE buku SET 
        judul_buku='$judul_buku', 
        pengarang='$pengarang', 
        tahun_terbit='$tahun_terbit', 
        isbn='$isbn', 
        jumlah_halaman='$jumlah_halaman', 
        stok='$stok'
        WHERE id='$id'";
}

# Eksekusi query
$tambah = mysqli_query($koneksi, $query);

#4. Jika berhasil, redirect ke index
if($tambah){
    header("location:index.php");
} else {
    echo "Data Gagal diubah: " . mysqli_error($koneksi);
}
?>