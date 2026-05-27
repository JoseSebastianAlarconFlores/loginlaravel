<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Panel de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f1f5f9;
            color: #334155;
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
        }
        .profile-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background-color: #ffffff;
        }
        .avatar-circle {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            width: 80px;
            height: 80px;
            font-size: 32px;
            letter-spacing: -1px;
        }
        .info-box {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
        }
        .badge-admin {
            background-color: rgba(59, 130, 246, 0.1) !important;
            color: #2563eb !important;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        .badge-user {
            background-color: rgba(100, 116, 139, 0.1) !important;
            color: #475569 !important;
            border: 1px solid rgba(100, 116, 139, 0.2);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card profile-card p-4 shadow-lg text-center" style="width: 440px;">
        <div class="mb-3 position-relative d-inline-block mx-auto">
            <div class="avatar-circle text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm fw-bold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <span class="position-absolute bottom-0 end-0 bg-success border border-3 border-white rounded-circle p-2" title="Usuario Activo"></span>
        </div>
        
        <h4 class="mb-1 fw-bold text-dark tracking-tight">Mi Perfil</h4>
        <p class="text-muted small mb-4">Detalles de la sesión de usuario activa</p>

        <div class="info-box p-3 text-start mb-4">
            <div class="mb-3 d-flex align-items-start gap-3">
                <div class="text-muted mt-1"><i class="bi bi-person shadow-sm p-1.5 bg-white rounded-3"></i></div>
                <div>
                    <span class="text-muted small d-block fw-semibold" style="font-size: 0.75rem;">Nombre Completo</span>
                    <span class="fw-bold text-dark fs-6">{{ $user->name }}</span>
                </div>
            </div>
            
            <div class="mb-3 d-flex align-items-start gap-3">
                <div class="text-muted mt-1"><i class="bi bi-person-badge shadow-sm p-1.5 bg-white rounded-3"></i></div>
                <div>
                    <span class="text-muted small d-block fw-semibold" style="font-size: 0.75rem;">Nombre de Usuario (Login)</span>
                    <code class="text-primary fw-semibold fs-6 font-monospace">{{ $user->email }}</code>
                </div>
            </div>
            
            <div class="d-flex align-items-start gap-3">
                <div class="text-muted mt-1"><i class="bi bi-shield-check shadow-sm p-1.5 bg-white rounded-3"></i></div>
                <div>
                    <span class="text-muted small d-block fw-semibold mb-1" style="font-size: 0.75rem;">Rol Asignado</span>
                    @if($user->role == 'admin')
                        <span class="badge badge-admin px-3 py-1.5 rounded-pill text-uppercase fw-semibold" style="font-size: 0.75rem;">
                            <i class="bi bi-patch-check-fill me-1"></i> Administrador
                        </span>
                    @else
                        <span class="badge badge-user px-3 py-1.5 rounded-pill text-uppercase fw-semibold" style="font-size: 0.75rem;">
                            <i class="bi bi-person me-1"></i> Usuario
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 fw-semibold py-2 rounded-3 shadow-sm d-flex align-items-center justify-content-center gap-2 transition">
                <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
            </button>
        </form>
    </div>

</body>
</html>