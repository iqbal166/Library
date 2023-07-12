<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Online Library</title>
    <style>
        body{
            background: #d3d3d3;
        }
        .main{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form{
            background: #ffff;
            padding: 50px 30px;
        }
    </style>
</head>
<body>
            <div class="main">
                <div class="form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status'); }}
                        </div>
                    @endif

                    <h2>Forgot Your Password ?</h2>
                    <p>please enter your mail to password reset request</p>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Request Password Reset" class="btn btn-primary q-100 mt-3">
                            <a href="/login" class="btn btn-secondary q-100 mt-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>
