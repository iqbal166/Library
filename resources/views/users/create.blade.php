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
            <li class="nav-item"><a href="/library" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/users" class="nav-link active">User Management</a></li>
            <li class="nav-item"><a href="/login/logout" class="nav-link">Logout</a></li>
          </ul>
        </header>
      </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Form Tambah user</h3><br>

                <form action="/users/store" method="POST" col>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="uname">Username</label>
                                <input type="text" class="form-control" id="uname" name="uname" placeholder="Masukkan username" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="form-group" style="float: right">
                        <input type="submit" class="btn btn-success" value="Simpan Data">
                        <a class="btn btn-secondary btn-sm" href="/users" style="height: 37px">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
