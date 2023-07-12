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
        <header class="d-flex justify-content-between py-3">
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="/library" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/library/user-manag" class="nav-link">User Management</a></li>
            <li class="nav-item"><a href="/login/logout" class="nav-link">Logout</a></li>
          </ul>
        </header>
      </div>
    <div class="container">
        <div class="card" style="margin-top: 50px">
            <div class="card-body">
                <h3>Form Update Buku</h3><br>

                @foreach ($library as $l)
                <form action="/library/update" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $l->id_buku }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="kode">Kode Buku</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ $l->kode_buku }}">
                            </div>
                            <div class="col">
                                <label for="judul">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $l->judul_buku }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="penulis">Penulis Buku</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $l->penulis_buku }}">
                            </div>
                            <div class="col">
                                <label for="penerbit">Penerbit Buku</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $l->penerbit_buku }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="tahun">Tahun Terbit Buku</label>
                                <input type="number" maxlength="4" class="form-control" id="tahun" name="tahun" value="{{ $l->tahun_penerbit }}">
                            </div>
                            <div class="col">
                                <label for="stok">Stok Buku</label>
                                <input type="number" class="form-control" id="stok" name="stok" value="{{ $l->stok }}">
                            </div>
                        </div>
                    </div><br><br>
                    <div class="form-group" style="float: right">
                        <input type="submit" class="btn btn-success" value="Simpan Data">
                        <a class="btn btn-secondary btn-sm" href="/library" style="height: 37px">Kembali</a>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
