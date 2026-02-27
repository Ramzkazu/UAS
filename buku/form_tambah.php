<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:#d1e6d4">
    <?php
    include_once("../nav.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM DAFTAR BUKU</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                                <input name="judul_buku" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                <input name="pengarang" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
                                <input name="tahun_terbit" type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ISBN</label>
                                <input name="isbn" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stok</label>
                                <input name="stok" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah Halaman</label>
                                <input name="jumlah_halaman" type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                                <select class="form-control" name="penerbit" id="">
                                    <option value="">-Pilih Penerbit-</option>
                                    <?php
                                        //Kode untuk looping gelombang
                                        include_once('../koneksi.php');
                                        $qry_jur = "SELECT * FROM penerbit";
                                        $data_gel = mysqli_query($koneksi, $qry_jur);
                                        foreach($data_gel as $item_gel){
                                    ?>
                                    <option value="<?=$item_gel['id']?>"><?=$item_gel['kode']?> - <?=$item_gel['penerbit']?></option>
                                    <?php
                                        //penutup looping gelombang
                                        }
                                    ?>
                                </select>
                            </div> -->

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <select class="form-control" name="kategori" id="">
                                    <option value="">-Pilih Kategori-</option>
                                    <?php
                                        //Kode untuk looping jurusan
                                        include_once('../koneksi.php');
                                        $qry_kategori = "SELECT * FROM kategori";
                                        $data_kategori = mysqli_query($koneksi, $qry_kategori);
                                        foreach($data_kategori as $item_kategori){
                                    ?>
                                    <option value="<?=$item_kategori['id']?>"> <?=$item_kategori['nm_kategori']?></option>
                                    <?php
                                        //penutup looping jurusan
                                        }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cover</label>
                                <input name="cover" type="file" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
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