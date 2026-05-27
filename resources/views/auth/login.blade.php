<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jose Sebastian Alarcon Flores</title>
    <!-- Bootstrap y Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            /* Fondo inspirado en la noche paceña y la silueta del Illimani */
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #311042 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Detalle sutil de Aguayo Paceño (Borde superior de la tarjeta) */
        .aguayo-line {
            height: 6px;
            background: linear-gradient(to right, 
                #e11d48 0%, #e11d48 20%, /* Rojo */
                #f59e0b 20%, #f59e0b 40%, /* Amarillo */
                #10b981 40%, #10b981 60%, /* Verde */
                #ec4899 60%, #ec4899 80%, /* Fucsia Aguayo */
                #3b82f6 80%, #3b82f6 100% /* Azul */
            );
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .login-card {
            background: rgba(30, 41, 59, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            /* Borde dorado suave que recuerda al metal de la platería paceña */
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 16px;
            padding: 0 !important; /* Para controlar el diseño interno con la barra aguayo */
        }

        .card-body-custom {
            padding: 2rem;
        }

        /* Ajuste de textos principales a Blanco/Brillante para corregir el contraste anterior */
        .text-paceño-bright {
            color: #f8fafc !important;
            text-shadow: 0px 2px 4px rgba(0,0,0,0.5);
        }

        .text-paceño-muted {
            color: #cbd5e1 !important;
        }

        .form-control {
            background-color: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(245, 158, 11, 0.4);
            color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: #f59e0b; /* Dorado/Amarillo Inti */
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.25);
            color: #fff;
        }

        /* Estilos específicos para el grupo de la contraseña y el "Ojito" */
        .password-container .input-group-text-btn {
            background-color: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(245, 158, 11, 0.4);
            border-left: none;
            color: #f59e0b; /* Color dorado para resaltar el ojito */
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .password-container .input-group-text-btn:hover {
            color: #ffffff;
            background-color: #f59e0b; /* Se pinta de dorado al pasar el mouse */
        }

        /* Botón de ingreso con energía de la tricolor / morenada */
        .btn-paceño {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            transition: transform 0.2s, background 0.3s;
        }

        .btn-paceño:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-1px);
            color: white;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card login-card shadow-2xl text-white" style="width: 420px;">
        <!-- Línea superior de Aguayo -->
        <div class="aguayo-line"></div>
        
        <div class="card-body-custom">
            <div class="text-center mb-4">
                <!-- Icono circular con destello dorado -->
                <div class="d-inline-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning rounded-circle mb-3" style="width: 60px; height: 60px; border: 1px solid rgba(245, 158, 11, 0.4);">
                    <i class="bi bi-shield-lock-fill fs-3"></i>
                </div>
                <!-- Se corrigió text-dark a blanco para que sea legible en el fondo oscuro -->
                <h4 class="fw-bold m-0 tracking-tight text-paceño-bright">SISTEMA DE LOGIN</h4>
                <small class="text-paceño-muted fw-medium">Estudiante: Jose Sebastian Alarcon Flores</small>
            </div>

            @if($errors->any())
                <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger py-2 text-center small rounded-3 mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <!-- Campo: Usuario -->
                <div class="mb-3">
                    <label class="form-label small text-paceño-muted fw-semibold">Nombre de Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent text-warning border-secondary border-opacity-50">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="email" class="form-control" required placeholder="jalarcon" autocomplete="off">
                    </div>
                </div>
                
                <!-- Campo: Contraseña + Ojito Paceño -->
                <div class="mb-4">
                    <label class="form-label small text-paceño-muted fw-semibold">Contraseña</label>
                    <div class="input-group password-container">
                        <span class="input-group-text bg-transparent text-warning border-secondary border-opacity-50">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" id="passwordInput" name="password" class="form-control border-end-0" required placeholder="••••••••">
                        <!-- El botón del Ojito interactivo -->
                        <button type="button" class="input-group-text input-group-text-btn" id="togglePasswordBtn" title="Mostrar/Ocultar contraseña">
                            <i class="bi bi-eye-fill" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Botón con fuerza Alteña/Paceña -->
                <button type="submit" class="btn btn-paceño w-100 fw-semibold py-2 rounded-3 shadow-sm">
                    Ingresar al Sistema <i class="bi bi-box-arrow-in-right ms-1"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Script para hacer funcionar el ojito -->
    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePasswordBtn.addEventListener('click', function () {
            // Alternar el tipo de input
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            // Alternar el icono del ojo (abierto / cerrado)
            if (isPassword) {
                eyeIcon.classList.remove('bi-eye-fill');
                eyeIcon.classList.add('bi-eye-slash-fill');
            } else {
                eyeIcon.classList.remove('bi-eye-slash-fill');
                eyeIcon.classList.add('bi-eye-fill');
            }
        });
    </script>
</body>
</html>