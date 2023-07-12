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
            <li class="nav-item"><a href="/users" class="nav-link">User Management</a></li>
            <li class="nav-item"><a href="/login/logout" class="nav-link">Logout</a></li>
          </ul>
        </header>
      </div>
    <div class="container">
        <div class="card" style="margin-top: 50px">
            <div class="card-body">
                <h3>Library</h3><br>
                <p>Cari Buku : </p>
                <div class="form-group">
                    <form action="/library/search" method="GET" class="form-inline">
                        <input type="text" class="form-control" name="cari" placeholder="Search">
                        <input type="submit" value="Search" class="btn btn-primary ml-3">
                    </form><br>

                    <a href="/library/create" role="button" class="btn btn-primary ml-3">Tambah Data Buku</a><br><br>

                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis Buku</th>
                            <th>Penerbit Buku</th>
                            <th>Tahun Terbit Buku</th>
                            <th>Stok Buku</th>
                        </tr>
                        @foreach ($library as $l)
                            <tr>
                                <td>{{ $l->kode_buku }}</td>
                                <td>{{ $l->judul_buku }}</td>
                                <td>{{ $l->penulis_buku }}</td>
                                <td>{{ $l->penerbit_buku }}</td>
                                <td>{{ $l->tahun_penerbit }}</td>
                                <td>{{ $l->stok }}</td>
                                <td>
                                    <a href="/library/edit/{{ $l->id_buku }}" class="btn btn-warning btn-sm">Edit</a> |
                                    <a href="/library/destroy/{{ $l->id_buku }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
