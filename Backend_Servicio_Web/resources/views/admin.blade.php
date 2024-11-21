<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - La Pinta</title>
    <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
    <!-- Bootstrap y FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gestion_pedidos/CSS/admin.css') }}">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar text-white p-3">
            <img src="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" alt="Logo La Pinta" class="logo-sidebar mb-4">
            <h2 class="mb-4">La Pinta Admin</h2>
            <ul class="nav flex-column">
                <li class="nav-item mb-3"><a class="nav-link text-white active" href="{{ route('admin') }}"><i class="fas fa-clipboard-list"></i> Pedidos</a></li>
                <li class="nav-item mb-3"><a class="nav-link text-white" href="{{ route('login') }}" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="content p-4 w-100">
            <h1 class="mb-4">Gestión de Pedidos</h1>

            <!-- Filtro por Estado -->
            <div class="mb-3">
                <label for="filterEstado" class="form-label">Filtrar por estado:</label>
                <select id="filterEstado" class="form-select">
                    <option value="Todos">Todos</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Atendido">Atendido</option>
                </select>
            </div>

            <!-- Tabla de Pedidos -->
            <div class="table-responsive">
                <table id="tablaPedidos" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Número</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Productos</th>
                            <th>Total</th> 
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ordenes as $orden)
                            <tr>
                                <td>{{ $orden->nombre }}</td>
                                <td>{{ $orden->telefono }}</td>
                                <td>{{ $orden->email }}</td>
                                <td>{{ $orden->direccion }}</td>
                                <td>
                                    <ul>
                                        @foreach ($orden->productos as $producto)
                                            <li>{{ $producto->nombre }} x{{ $producto->pivot->cantidad }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                </td>
                                <td>${{ number_format($orden->total, 2) }}</td> <!-- Mostrar el total -->
                                <td>
                                <td>
                                    <select onchange="cambiarEstado({{ $orden->id }}, this.value)" class="form-select">
                                        <option value="Pendiente" {{ $orden->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="Atendido" {{ $orden->estado == 'Atendido' ? 'selected' : '' }}>Atendido</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="eliminarOrden({{ $orden->id }})">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('Frontend_Gestion_Pedidos/JAVASCRIPT/admin.js') }}"></script>
    <script>
        function cambiarEstado(ordenId, nuevoEstado) {
            $.ajax({
                url: `/admin/ordenes/${ordenId}/estado`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: { estado: nuevoEstado },
                success: () => {
                    alert('Estado actualizado correctamente');
                },
                error: () => {
                    alert('Error al actualizar el estado');
                }
            });
        }

        function eliminarOrden(ordenId) {
            if (confirm('¿Estás seguro de eliminar esta orden?')) {
                $.ajax({
                    url: `/admin/ordenes/${ordenId}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    success: () => {
                        alert('Orden eliminada correctamente');
                        location.reload();
                    },
                    error: () => {
                        alert('Error al eliminar la orden');
                    }
                });
            }
        }
    </script>
</body>
</html>
