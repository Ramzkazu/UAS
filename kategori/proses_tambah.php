<?php
    #1. Meng-koneksikan ke PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil value dari Form Tambah
    $nm_kategori = $_POST['nm_kategori'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO kategori (nm_kategori) 
    VALUES ('$nm_kategori')";

    $tambah = mysqli_query($koneksi, $query);

    if($tambah){
        header("location:index.php");
    } else {
        echo "Gagal menambahkan data";
    }

?>