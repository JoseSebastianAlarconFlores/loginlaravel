<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - José Sebastián Alarcón Flores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b 0%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }
        .premium-border {
            height: 4px;
            background: linear-gradient(to right, #be123c, #b45309, #18a07a, #888845, #1d4ed8);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .login-card {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.15);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 420px;
            transition: all 0.4s ease;
        }

        .login-card:hover {
            border-color: rgba(212, 175, 55, 0.3);
            box-shadow: 0 25px 60px -12px rgba(212, 175, 55, 0.05);
        }

        .card-body-custom {
            padding: 3rem 2.5rem;
        }

        .text-bright {
            color: #f8fafc;
            letter-spacing: -0.025em;
        }

        .text-muted-custom {
            color: #94a3b8;
            font-size: 0.85rem;
        }

        .form-label {
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .input-group {
            border-radius: 12px;
            overflow: hidden;
            background-color: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-group:focus-within {
            border-color: #d4af37;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
            background-color: rgba(30, 41, 59, 0.8);
        }

        .input-group-text-custom {
            background: transparent;
            border: none;
            color: #64748b;
            padding-left: 1.2rem;
            padding-right: 0.8rem;
        }

        .form-control-custom {
            background: transparent;
            border: none;
            color: #f8fafc;
            padding: 0.75rem 1rem 0.75rem 0;
            font-size: 0.95rem;
        }

        .form-control-custom:focus {
            background: transparent;
            border: none;
            box-shadow: none;
            color: #fff;
        }

        .form-control-custom::placeholder {
            color: #475569;
        }

        .btn-toggle-pwd {
            background: transparent;
            border: none;
            color: #64748b;
            padding-right: 1.2rem;
            transition: color 0.2s;
        }

        .btn-toggle-pwd:hover {
            color: #d4af37;
        }

        .btn-premium {
            background: linear-gradient(135deg, #d4af37 0%, #aa7c11 100%);
            border: none;
            color: #0f172a;
            font-weight: 600;
            padding: 0.8rem;
            border-radius: 12px;
            letter-spacing: 0.025em;
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background: linear-gradient(135deg, #e5c158 0%, #c5921a 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(212, 175, 55, 0.5);
            color: #0f172a;
        }

        .btn-premium:active {
            transform: translateY(0);
        }

        .brand-icon-container {
            width: 56px;
            height: 56px;
            background: rgba(212, 175, 55, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.2);
            color: #d4af37;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

    <div class="card login-card text-white">
        <div class="premium-border"></div>
        
        <div class="card-body-custom">
            <div class="text-center">
                <div class="brand-icon-container">
                    <i class="bi bi-lock fs-4"></i>
                </div>
                <h4 class="fw-bold m-0 text-bright">Iniciar Sesión</h4>
                <div class="text-center pb-4">
                    <span style="font-size: 0.75rem; color: #475569; display: block; margin-bottom: 2px;">ESTUDIANTE</span>
                    <span style="font-size: 0.8rem; color: #cbd5e1; font-weight: 500;">Jose Sebastian Alarcon Flores</span>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger py-2.5 text-center small rounded-3 mb-4">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Nombre de Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="email" class="form-control-custom w-100" style="outline: none;" placeholder="Ej: omarqm" required autocomplete="off">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text-custom">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" name="password" class="form-control-custom" style="outline: none;" placeholder="Mínimo 4 caracteres" required>
                        
                        <button type="button" class="btn-toggle-pwd">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-premium w-100 shadow-sm">
                    Acceder
                </button>
            </form>
        </div>
        
    </div>
    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePasswordBtn.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            if (isPassword) {
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
</body>
</html>