<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jose Sebastian Alarcon Flores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            min-height: 100vh;
        }
        .login-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(189, 177, 177, 0.64);
            border-radius: 16px;
        }
        .form-control {
            background-color: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(201, 190, 190, 0.73);
            color: #f8fafc;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
            color: #fff;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card login-card p-4 shadow-2xl text-white" style="width: 420px;">
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-shield-lock-fill fs-3"></i>
            </div>
            <h4 class="fw-bold m-0 tracking-tight text-dark">SISTEMA DE LOGIN</h4>
            <small class="text-dark text-opacity-75 fw-medium">Estudiante: Jose Sebastian Alarcon Flores</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger py-2 text-center small rounded-3 mb-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small text-secondary fw-semibold">Nombre de Usuario</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted border-secondary border-opacity-25">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="email" class="form-control border-start-0 ps-0" required placeholder="username" autocomplete="off">
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label small text-secondary fw-semibold">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted border-secondary border-opacity-25">
                        <i class="bi bi-key"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-start-0 ps-0" required placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-semibold py-2 rounded-3 shadow-sm transition">
                Iniciar Sesión <i class="bi bi-box-arrow-in-right ms-1"></i>
            </button>
        </form>
    </div>

</body>
</html>