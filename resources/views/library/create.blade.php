<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Online Library</title>
</head>
<body>
    <div class="container">
        <div class="card" style="margin-top: 50px">
            <div class="card-body">
                <h3>Form Tambah Buku</h3><br>

                <form action="/library/store" method="POST" col>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="kode">Kode Buku</label>
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Buku" required>
                            </div>
                            <div class="col">
                                <label for="judul">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Buku" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="penulis">Penulis Buku</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Penulis Buku" required>
                            </div>
                            <div class="col">
                                <label for="penerbit">Penerbit Buku</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="tahun">Tahun Terbit Buku</label>
                                <input type="number" maxlength="4" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun Terbit Buku">
                            </div>
                            <div class="col">
                                <label for="stok">Stok Buku</label>
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Buku">
                            </div>
                        </div>
                    </div><br><br>
                    <div class="form-group" style="float: right">
                        <input type="submit" class="btn btn-success" value="Simpan Data">
                        <a class="btn btn-secondary btn-sm" href="/library" style="height: 37px">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
