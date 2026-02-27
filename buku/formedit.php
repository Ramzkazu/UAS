<?php
include_once("../koneksi.php");
$idedit = $_GET['id'];
$qry = "SELECT * FROM buku WHERE id='$idedit'";
$edit = mysqli_query($koneksi,$qry);
$data = mysqli_fetch_array($edit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:#d1e6d4">
    <?php include_once("../nav.php"); ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM EDIT DAFTAR BUKU</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input name="judul_buku" type="text" class="form-control" value="<?= $data['judul_buku']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pengarang</label>
                                <input name="pengarang" type="text" class="form-control" value="<?= $data['pengarang']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Terbit</label>
                                <input name="tahun_terbit" type="date" class="form-control" value="<?= $data['tahun_terbit']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ISBN</label>
                                <input name="isbn" type="text" class="form-control" value="<?= $data['isbn']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input name="stok" type="text" class="form-control" value="<?= $data['stok']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Halaman</label>
                                <input name="jumlah_halaman" type="number" class="form-control" value="<?= $data['jumlah_halaman']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cover</label>
                                <input name="cover" type="file" class="form-control">
                                <?php if($data['cover'] != ""): ?>
                                    <small>Cover saat ini: <?= $data['cover']; ?></small>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>