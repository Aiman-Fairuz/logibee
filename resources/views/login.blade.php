<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Cashmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { height: 100vh; }
        .login-container { display: flex; height: 100%; }
        .login-left { flex: 1; display: flex; align-items: center; justify-content: center; }
        .login-right { flex: 1; background: #16a34a; color: white; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .card { width: 350px; }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left: Form -->
        <div class="login-left">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Sign In</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign In</button>
                </form>
            </div>
        </div>

        <!-- Right: Branding -->
        <div class="login-right">
            <h2>Cashmate</h2>
            <p>Welcome to Cashmate<br> Aplikasi Kasir Modern untuk Bisnis Anda</p>
        </div>
    </div>
</body>
</html>
