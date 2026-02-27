<?php
    #1. Meng-koneksikan ke PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil value dari Form Tambah
    $nm_penerbit = $_POST['nm_penerbit'];
    $alamat_penerbit = $_POST['alamat_penerbit'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO penerbit (nm_penerbit,alamat_penerbit) 
    VALUES ('$nm_penerbit', '$alamat_penerbit')";

    $tambah = mysqli_query($koneksi, $query);

    if($tambah){
        header("location:index.php");
    } else {
        echo "Gagal menambahkan data";
    }

    move_uploaded_file($tmp_foto, to: "../cover/$cover");
?>