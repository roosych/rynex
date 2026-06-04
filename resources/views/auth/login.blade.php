<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Swift Fix</title>
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/all.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <style>
        body {
            background: #0f1b2d;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
        }
        .login-card {
            background: #fff; border-radius: 16px;
            padding: 48px 44px; width: 100%; max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
        }
        .login-logo { text-align: center; margin-bottom: 32px; }
        .login-logo img { height: 44px; }
        .login-title {
            text-align: center; font-size: 1.35rem; font-weight: 700;
            color: #1a2e44; margin-bottom: 6px;
        }
        .login-subtitle {
            text-align: center; font-size: 0.88rem; color: #6b7280;
            margin-bottom: 32px;
        }
        .form-label {
            font-size: 0.8rem; font-weight: 600; color: #374151;
            text-transform: uppercase; letter-spacing: 0.06em;
        }
        .form-control { border-radius: 8px; border-color: #e5e7eb; padding: 10px 14px; }
        .form-control:focus { border-color: var(--accent-color, #e63946); box-shadow: 0 0 0 3px rgba(230,57,70,0.12); }
        .is-invalid { border-color: #dc2626 !important; }
        .invalid-feedback { font-size: 0.82rem; color: #dc2626; }
        .btn-login {
            width: 100%; background: var(--accent-color, #e63946); color: #fff;
            border: none; border-radius: 8px; padding: 12px;
            font-weight: 700; font-size: 1rem; cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-login:hover { opacity: 0.9; }
        .back-link {
            text-align: center; margin-top: 20px; font-size: 0.85rem;
        }
        .back-link a { color: #6b7280; text-decoration: none; }
        .back-link a:hover { color: var(--accent-color, #e63946); }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-logo">
        <img src="{{ $generalSettings->logo ?: '/template/images/template/logo1.png' }}" alt="{{ $generalSettings->company_name }}" onerror="this.style.display='none'">
    </div>
    <div class="login-title">Admin Login</div>
    <div class="login-subtitle">Sign in to manage your content</div>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                autocomplete="email"
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                autocomplete="current-password"
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember" style="font-size:0.88rem;color:#6b7280;">Remember me</label>
        </div>

        <button type="submit" class="btn-login">Sign In</button>
    </form>

    <div class="back-link">
        <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left" style="font-size:0.8em;"></i> Back to website</a>
    </div>
</div>

</body>
</html>
