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
            width: 500px;
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

            <form action="{{ route(password.update) }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ request()->email }}">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password_confirmation" class="form-control" name="password_confirmation">
                <input type="submit" value="Update Password" class="btn btn-primary q-100 mt-3">
            </form>
        </div>
    </div>
</body>
</html>
