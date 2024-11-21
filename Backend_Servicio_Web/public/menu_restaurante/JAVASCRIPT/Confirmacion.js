// Recuperar los detalles de la orden desde localStorage
const orderDetails = JSON.parse(localStorage.getItem("orderDetails"));

// Verificar si hay detalles de la orden almacenados
if (orderDetails) {
  const orderSummaryDiv = document.getElementById("order-summary");

  // Crear elementos HTML para mostrar los detalles del cliente
  const customerInfo = `
        <h2>Detalles del Cliente</h2>
        <p><strong>Nombre:</strong> ${orderDetails.nombre}</p>
        <p><strong>Teléfono:</strong> ${orderDetails.telefono}</p>
        <p><strong>Correo Electrónico:</strong> ${orderDetails.email}</p>
        <p><strong>Dirección:</strong> ${orderDetails.direccion}</p>
    `;

  // Crear elementos HTML para mostrar los productos
  let cartItems = "<h2>Productos Comprados</h2><ul>";
  orderDetails.productos.forEach((item) => {
    cartItems += `
            <li>
                <strong>ID:</strong> ${item.id} - 
                <strong>Cantidad:</strong> ${item.cantidad} - 
                <strong>Precio Unitario:</strong> $${item.precio_unitario.toLocaleString()}
            </li>
        `;
  });
  cartItems += "</ul>";

  // Calcular el subtotal, IVA (19%) y total
  const total = orderDetails.productos.reduce(
    (acc, item) => acc + item.precio_unitario * item.cantidad,
    0
  );
  const tax = total * 0.19; // 19% de IVA
  const subtotal = total - tax;

  // Crear el resumen de totales
  const orderTotals = `
        <h2>Resumen del Pedido</h2>
        <p><strong>Subtotal:</strong> $${subtotal.toFixed(2)}</p>
        <p><strong>IVA (19%):</strong> $${tax.toFixed(2)}</p>
        <p><strong>Total:</strong> $${total.toFixed(2)}</p>
    `;

  // Insertar el contenido generado en el contenedor
  orderSummaryDiv.innerHTML = customerInfo + cartItems + orderTotals;
} else {
  // Si no hay detalles de la orden, mostrar un mensaje
  document.getElementById("order-summary").innerHTML =
    "<p>No hay detalles de pedido para mostrar. Por favor, regresa al carrito.</p>";
}
