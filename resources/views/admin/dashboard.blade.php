<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador (ABM) - Jose Sebastian Alarcon Flores</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .navbar-custom {
            background-color: #0f172a;
        }
        .custom-card {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .form-label {
            font-weight: 500;
            color: #374151;
        }
        .table-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }
        .table thead {
            background-color: #f9fafb;
        }
        .badge-admin {
            background-color: #1e3a8a;
            color: #93c5fd;
        }
        .badge-user {
            background-color: #4b5563;
            color: #e5e7eb;
        }
        .btn-delete {
            background-color: #dc2626;
            color: #ffffff;
            border: none;
            transition: background-color 0.2s;
        }
        .btn-delete:hover {
            background-color: #b91c1c;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom navbar-dark shadow-sm py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand mb-0 h1 fw-semibold d-flex align-items-center gap-2">
                <i class="bi bi-layers text-secondary"></i> Panel de Administración (ABM)
            </span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-light fw-medium px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </nav>

    <main class="container mb-5">
        
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm d-flex align-items-center rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div class="card custom-card p-4 mb-4">
            <div class="d-flex align-items-center border-bottom pb-2 mb-4">
                <i class="bi bi-person-plus fs-4 me-2 text-dark"></i>
                <h5 class="m-0 fw-bold text-dark">Registrar Nuevo Usuario</h5>
            </div>
            
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label small">Nombre Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Ej: Omar" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label small">Nombre de Usuario</label>
                        <input type="text" name="email" class="form-control" placeholder="Ej: omarqm" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label small">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Mínimo 4 caracteres" required>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label small">Rol</label>
                        <select name="role" class="form-select">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary px-4 fw-medium d-flex align-items-center gap-1">
                            <i class="bi bi-check-lg"></i> Crear
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card custom-card p-4">
            <div class="d-flex align-items-center border-bottom pb-2 mb-4">
                <i class="bi bi-people fs-4 me-2 text-dark"></i>
                <h5 class="m-0 fw-bold text-dark">Usuarios Registrados</h5>
            </div>
            
            <div class="table-container bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0">
                        <thead>
                            <tr class="table-light">
                                <th class="ps-4 py-3 text-secondary fw-semibold" style="width: 80px;">ID</th>
                                <th class="py-3 text-secondary fw-semibold">Nombre Completo</th>
                                <th class="py-3 text-secondary fw-semibold">Nombre de Usuario</th>
                                <th class="py-3 text-secondary fw-semibold">Rol</th>
                                <th class="text-center py-3 text-secondary fw-semibold" style="width: 160px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td class="ps-4 fw-bold text-muted">{{ $u->id }}</td>
                                <td class="fw-semibold text-dark">{{ $u->name }}</td>
                                <td class="text-secondary font-monospace">{{ $u->email }}</td>
                                <td>
                                    @if($u->role == 'admin')
                                        <span class="badge badge-admin px-2.5 py-1.5 rounded-pill text-uppercase fw-semibold">
                                            <i class="bi bi-patch-check-fill me-1"></i> Administrador
                                        </span>
                                    @else
                                        <span class="badge badge-user px-2.5 py-1.5 rounded-pill text-uppercase fw-semibold">
                                            <i class="bi bi-person me-1"></i> Usuario
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete px-3 py-1.5 rounded-2 d-inline-flex align-items-center gap-1" onclick="return confirm('¿Estás seguro de eliminar a este usuario?')">
                                            <i class="bi bi-trash3"></i> Eliminar
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