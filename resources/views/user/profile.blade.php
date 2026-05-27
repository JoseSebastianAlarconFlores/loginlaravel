<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Panel de Usuario</title>
    <!-- Bootstrap 5 y Google Fonts para una consistencia premium -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Mismo fondo corporativo profundo que el Login */
            background: radial-gradient(circle at top right, #1e1b4b 0%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        /* Detalle ultra delgado de Aguayo Formalizado */
        .premium-border {
            height: 4px;
            background: linear-gradient(to right, #be123c, #b45309, #047857, #db2777, #1d4ed8);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .profile-card {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            /* Borde sutil de oro platino */
            border: 1px solid rgba(212, 175, 55, 0.15);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 440px;
            padding: 0 !important; /* Control total interno */
            transition: all 0.4s ease;
        }

        .profile-card:hover {
            border-color: rgba(212, 175, 55, 0.25);
        }

        .card-body-custom {
            padding: 2.5rem 2.2rem;
        }

        /* Contenedor del Avatar refinado */
        .avatar-container {
            width: 84px;
            height: 84px;
            position: relative;
            margin: 0 auto 1.2rem auto;
        }

        .avatar-circle {
            background: linear-gradient(135deg, #d4af37 0%, #aa7c11 100%);
            width: 100%;
            height: 100%;
            font-size: 28px;
            font-weight: 600;
            color: #0f172a;
            letter-spacing: -0.5px;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .status-indicator {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 16px;
            height: 16px;
            background-color: #10b981; /* Verde esmeralda */
            border: 3px solid #141b2d;
            border-radius: 50%;
        }

        .text-bright {
            color: #f8fafc;
            letter-spacing: -0.025em;
        }

        .text-muted-custom {
            color: #94a3b8;
            font-size: 0.85rem;
        }

        /* Caja de información integrada al diseño oscuro */
        .info-container {
            background-color: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 1.25rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
        }

        .info-item:not(:last-child) {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .icon-wrapper {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #d4af37; /* Detalle dorado sutil en los iconos */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .info-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-uppercase: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 1px;
        }

        .info-value {
            color: #f1f5f9;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .info-code {
            color: #e2e8f0;
            font-family: 'SFMono-Regular', Menlo, Monaco, Consolas, monospace;
            font-size: 0.9rem;
            background: rgba(212, 175, 55, 0.08);
            padding: 2px 6px;
            border-radius: 6px;
            border: 1px solid rgba(212, 175, 55, 0.15);
        }

        /* Badges formales y minimalistas */
        .badge-custom {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
        }

        .badge-admin {
            background-color: rgba(212, 175, 55, 0.1) !important;
            color: #e5c158 !important;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .badge-user {
            background-color: rgba(148, 163, 184, 0.1) !important;
            color: #cbd5e1 !important;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        /* Botón de Logout refinado */
        .btn-logout {
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            font-weight: 500;
            padding: 0.75rem;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: #ef4444;
            color: #ffffff;
            transform: translateY(-1px);
        }
        
        .btn-logout:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <div class="card profile-card text-white">
        <!-- Línea superior de Aguayo integrada -->
        <div class="premium-border"></div>
        
        <div class="card-body-custom">
            <!-- Cabecera de Perfil -->
            <div class="text-center mb-4">
                <div class="avatar-container">
                    <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <span class="status-indicator" title="Usuario Activo"></span>
                </div>
                <h4 class="fw-bold m-0 text-bright">Mi Perfil</h4>
                <p class="text-muted-custom mt-1 mb-0">Detalles de la sesión activa</p>
            </div>

            <!-- Bloque de Información -->
            <div class="info-container mb-4">
                <!-- Nombre Completo -->
                <div class="info-item">
                    <div class="icon-wrapper">
                        <i class="bi bi-person"></i>
                    </div>
                    <div>
                        <span class="info-label">Nombre Completo</span>
                        <span class="info-value">{{ $user->name }}</span>
                    </div>
                </div>
                
                <!-- Nombre de Usuario (Email/Login) -->
                <div class="info-item">
                    <div class="icon-wrapper">
                        <i class="bi bi-fingerprint"></i>
                    </div>
                    <div>
                        <span class="info-label">Identificador de Acceso</span>
                        <span class="info-code">{{ $user->email }}</span>
                    </div>
                </div>
                
                <!-- Rol Asignado -->
                <div class="info-item">
                    <div class="icon-wrapper">
                        <i class="bi bi-shield-protected"></i>
                    </div>
                    <div>
                        <span class="info-label mb-1">Rol Asignado</span>
                        @if($user->role == 'admin')
                            <span class="badge-custom badge-admin">
                                <i class="bi bi-patch-check me-1.5"></i>Administrador
                            </span>
                        @else
                            <span class="badge-custom badge-user">
                                <i class="bi bi-person-workspace me-1.5"></i>Usuario General
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Acción: Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-logout w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-left"></i> Cerrar Sesión Activa
                </button>
            </form>
        </div>
    </div>

</body>
</html>