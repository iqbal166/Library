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
        <div class="card" style="margin-top: 50px">
            <div class="card-body">
                <h3>User Management</h3><br>
                <p>Cari User : </p>
                <div class="form-group">

                    <a href="/users/create" role="button" class="btn btn-primary ml-3">Tambah Data User</a><br><br>

                    <table class="table table-bordered">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <a href="/users/edit/{{ $u->id }}" class="btn btn-warning btn-sm">Edit</a> |
                                    <a href="/users/destroy/{{ $u->id }}" class="btn btn-danger btn-sm">Hapus</a>
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
