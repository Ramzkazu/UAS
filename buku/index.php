<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/all.css">

</head>

<body style="background-color:#d1e6d4">
    <?php
    include_once("../nav.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-10 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>DAFTAR BUKU</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i> Tambah data</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include("../koneksi.php");

                                #2. menulikan query menampilkan data
                                $qry = "SELECT *, buku.id AS idb FROM buku INNER JOIN kategori ON buku.kategoris_id = kategori.id";

                                #3. menjalankan query
                                $tampil = mysqli_query($koneksi,$qry);

                                #4. looping hasil query
                                $nomor = 1;
                                foreach($tampil as $data){

                                ?>
                                <tr>
                                    <th scope="row"><?=$nomor++?></th>
                                    <td><?=$data['judul_buku']?></td>
                                    <td><?=$data['isbn']?></td>
                                    <td><?=$data['pengarang']?></td>
                                    <td><?=$data['tahun_terbit']?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data['idb']?>"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a href="formedit.php?id=<?=$data['idb']?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?=$data['idb']?>"><i class="fa-solid fa-trash"></i></button>

                                        <!-- Modal Detail-->
                                        <div class="modal fade" id="exampleModal<?=$data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Detail <?=$data['id']?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"><img src="../cover/<?=$data['cover']?>" height="150" alt=""><td></td>Cover</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Judul Buku</td>
                                                        <th scope="row"><?=$data['judul_buku']?></th>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>penerbit</td>
                                                        <th scope="row"><?=$data['nm_penerbit']?></th>
                                                    </tr> -->
                                                    <tr>
                                                        <td>Kategori</td>
                                                        <th scope="row"><?=$data['nm_kat']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengarang</td>
                                                        <th scope="row"><?=$data['pengarang']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Terbit</td>
                                                        <th scope="row"><?=$data['tahun_terbit']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>isbn</td>
                                                        <th scope="row"><?=$data['isbn']?></th>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <td>jumlah Halaman</td>
                                                        <th scope="row"><?=$data['jumlah_halaman']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Stok</td>
                                                        <th scope="row"><?=$data['stok']?></th>
                                                    </tr>
                                                    <tr>
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="modalhapus<?=$data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Data Dengan Jduul Buku <?=$data['judul_buku']?> Ingin Dihapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="proseshapus.php?id=<?=$data['id']?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="../js/all.js"></script>
</body>

</html>