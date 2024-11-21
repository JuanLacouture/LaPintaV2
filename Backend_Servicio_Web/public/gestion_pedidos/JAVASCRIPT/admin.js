$(document).ready(function () {
    // Inicializar DataTable
    const tablaPedidos = $('#tablaPedidos').DataTable({
        ajax: '/admin/ordenes',
        columns: [
            { data: 'nombre' },
            { data: 'telefono' },
            { data: 'email' },
            { data: 'direccion' },
            {
                data: 'productos',
                render: function (data) {
                    let productosHTML = '<ul>';
                    data.forEach((producto) => {
                        productosHTML += `<li>${producto.nombre} x${producto.cantidad}</li>`;
                    });
                    productosHTML += '</ul>';
                    return productosHTML;
                }
            },
            {
                data: 'estado',
                render: function (data, type, row) {
                    return `
                        <select class="form-select estado-select" data-id="${row.id}">
                            <option value="Pendiente" ${data === 'Pendiente' ? 'selected' : ''}>Pendiente</option>
                            <option value="Atendido" ${data === 'Atendido' ? 'selected' : ''}>Atendido</option>
                        </select>
                    `;
                }
            },
            {
                data: null,
                defaultContent: `
                    <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash-alt"></i> Eliminar</button>
                `
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        }
    });

    // Manejar el cambio de estado
    $('#tablaPedidos').on('change', '.estado-select', function () {
        const nuevoEstado = $(this).val();
        const ordenId = $(this).data('id'); // ID de la orden asociado a la fila

        $.ajax({
            url: `/admin/ordenes/${ordenId}/estado`, // Asegúrate de que esta URL es correcta
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: { estado: nuevoEstado },
            success: () => {
                alert('Estado actualizado correctamente');
                tablaPedidos.ajax.reload(); // Recargar la tabla
            },
            error: (xhr, status, error) => {
                console.error('Error al actualizar el estado:', error);
                alert('Error al actualizar el estado');
            }
        });
    });

    // Manejar la eliminación de órdenes
    $('#tablaPedidos').on('click', '.btn-delete', function () {
        const fila = $(this).closest('tr');
        const data = tablaPedidos.row(fila).data();
        const ordenId = data.id;

        if (confirm('¿Estás seguro de que deseas eliminar esta orden?')) {
            $.ajax({
                url: `/admin/ordenes/${ordenId}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: () => {
                    alert('Orden eliminada correctamente');
                    tablaPedidos.ajax.reload(); // Recargar la tabla
                },
                error: (xhr, status, error) => {
                    console.error('Error al eliminar la orden:', error);
                    alert('Error al eliminar la orden');
                }
            });
        }
    });

    // Manejar el filtro por estado
    $('#filterEstado').on('change', function () {
        tablaPedidos.column(5).search(this.value).draw(); // Filtrar por estado
    });

    // Manejar el clic en el botón de Logout
    $('#logoutBtn').on('click', () => {
        const confirmLogout = confirm("¿Estás seguro de que deseas cerrar sesión?");
        if (confirmLogout) {
            window.location.href = "/logout";
        }
    });
});
