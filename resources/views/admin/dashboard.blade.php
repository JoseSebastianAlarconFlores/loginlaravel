<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador (ABM) - Sistema Académico</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b 0%, #0f172a 100%);
            color: #f8fafc;
            min-height: 100vh;
        }

        .premium-top-bar {
            height: 4px;
            background: linear-gradient(to right, #be123c, #b45309, #047857, #db2777, #1d4ed8);
            width: 100%;
        }

        .navbar-custom {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .navbar-brand {
            letter-spacing: -0.025em;
            color: #f8fafc !important;
        }

        .brand-icon-box {
            width: 36px;
            height: 36px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
            color: #d4af37;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .btn-logout-nav {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .btn-logout-nav:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.4);
            color: #fca5a5;
        }

        .custom-card {
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(212, 175, 55, 0.12);
            border-radius: 16px;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.3);
            transition: border-color 0.3s ease;
        }

        .custom-card:hover {
            border-color: rgba(212, 175, 55, 0.25);
        }

        .card-header-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #74879a;
            letter-spacing: -0.02em;
        }

        .header-icon-wrapper {
            color: #d4af37;
            font-size: 1.25rem;
        }

        .form-label {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.8rem;
            text-uppercase: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            background-color: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #f8fafc;
            border-radius: 10px;
            padding: 0.65rem 1rem;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(30, 41, 59, 0.7);
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
            color: #fff;
        }

        .form-control::placeholder {
            color: #475569;
        }

        .btn-premium-action {
            background: linear-gradient(135deg, #d4af37 0%, #aa7c11 100%);
            border: none;
            color: #0f172a;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.65rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-premium-action:hover {
            background: linear-gradient(135deg, #e5c158 0%, #c5921a 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 16px -4px rgba(212, 175, 55, 0.3);
            color: #0f172a;
        }

        .table-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            background: rgba(30, 41, 59, 0.2) !important;
        }

        .table-dark, .table-dark th, .table-dark td {
            background-color: transparent !important;
            color: #cbd5e1 !important;
        }

        .table th {
            color: #64748b !important;
            font-size: 0.75rem;
            font-weight: 600;
            text-uppercase: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        .table td .text-white, .table td.text-white {
            color: #ffffff !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.02) !important;
            color: #fff;
        }

        .font-code-custom {
            font-family: 'SFMono-Regular', Menlo, Monaco, Consolas, monospace;
            font-size: 0.85rem;
            color: #e2e8f0;
            background: rgba(255, 255, 255, 0.05);
            padding: 2px 6px;
            border-radius: 4px;
        }

        .badge-custom {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            padding: 0.3rem 0.65rem;
            border-radius: 6px;
            text-uppercase: uppercase;
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

        .btn-delete-custom {
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #dd3636;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-delete-custom:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: #ef4444;
            color: #fff;
        }

        .alert-success-custom {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <div class="premium-top-bar"></div>

    <nav class="navbar navbar-custom sticky-top py-3 mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1 fw-bold d-flex align-items-center gap-2.5">
                <div class="brand-icon-box">
                    <i class="bi bi-layers"></i>
                </div>
                Panel de Administración <span class="fw-light text-muted-custom fs-6 d-none d-sm-inline">| ABM</span>
            </span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-logout-nav d-flex align-items-center gap-2">
                    <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </nav>

    <main class="container mb-5">
        
        @if(session('success'))
            <div class="alert alert-success-custom p-3 d-flex align-items-center shadow-sm mb-4" role="alert">
                <i class="bi bi-check2-circle me-2.5 fs-5"></i>
                <div class="small fw-medium">{{ session('success') }}</div>
            </div>
        @endif

        <div class="card custom-card p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary border-opacity-25 pb-3 mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-plus header-icon-wrapper me-2.5"></i>
                    <h5 class="m-0 card-header-title">Registrar Nuevo Usuario</h5>
                </div>
                <span class="text-muted-custom small" style="font-size: 0.75rem;">MÓDULO DE ACCESOS</span>
            </div>
            
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row g-3.5">
                    <div class="col-md-6 col-lg-3 mb-2">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Ej: Omar" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-3 mb-2">
                        <label class="form-label">Nombre de Usuario</label>
                        <input type="text" name="email" class="form-control" placeholder="Ej: omarqm" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-3 mb-2">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Mínimo 4 caracteres" required>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-2">
                        <label class="form-label">Rol</label>
                        <select name="role" class="form-select">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn btn-premium-action px-4">
                            <i class="bi bi-plus-lg me-1.5"></i>Crear Cuenta
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card custom-card p-4">
            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary border-opacity-25 pb-3 mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-people header-icon-wrapper me-2.5"></i>
                    <h5 class="m-0 card-header-title">Usuarios Registrados</h5>
                </div>
                <span class="text-muted-custom small" style="font-size: 0.75rem;">REGISTROS ACTIVOS</span>
            </div>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle m-0" style="background: transparent;">
                        <thead>
                            <tr>
                                <th class="ps-4 py-3" style="width: 90px;">Identificador</th>
                                <th class="py-3">Nombre Completo</th>
                                <th class="py-3">Nombre de Usuario (Login)</th>
                                <th class="py-3">Nivel de Acceso</th>
                                <th class="text-center py-3" style="width: 140px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td class="ps-4 fw-semibold text-muted" style="font-size: 0.85rem;">#{{ $u->id }}</td>
                                <td class="fw-medium text-white">{{ $u->name }}</td>
                                <td>
                                    <span class="font-code-custom">{{ $u->email }}</span>
                                </td>
                                <td>
                                    @if($u->role == 'admin')
                                        <span class="badge-custom badge-admin">
                                            <i class="bi bi-patch-check me-1.5"></i>Administrador
                                        </span>
                                    @else
                                        <span class="badge-custom badge-user">
                                            <i class="bi bi-person-workspace me-1.5"></i>Usuario
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete-custom d-inline-flex align-items-center gap-1" onclick="return confirm('¿Confirma la eliminación permanente de este registro?')">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>