<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST['id']; 
$nm_kategori = $_POST['nm_kategori'];

    # Query UPDATE tanpa ubah cover
    $query = "UPDATE kategori SET 
        nm_kategori='$nm_kategori'
        WHERE id='$id'";

# Eksekusi query
$tambah = mysqli_query($koneksi, $query);

#4. Jika berhasil, redirect ke index
if($tambah){
    header("location:index.php");
} else {
    echo "Data Gagal diubah: " . mysqli_error($koneksi);
}
?>