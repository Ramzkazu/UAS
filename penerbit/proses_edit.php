<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST['id']; 
$nm_penerbit = $_POST['nm_penerbit'];
$alamat_penerbit = $_POST['alamat_penerbit'];

    # Query UPDATE tanpa ubah cover
    $query = "UPDATE penerbit SET 
        nm_penerbit='$nm_penerbit', 
        alamat_penerbit='$alamat_penerbit' 
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