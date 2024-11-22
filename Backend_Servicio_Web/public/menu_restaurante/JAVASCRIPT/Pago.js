// Obtener los datos del carrito desde localStorage
const cart = JSON.parse(localStorage.getItem("cart")) || [];

// Asegurarse de que el total se guarda correctamente desde Carrito.js
let totalCalculated = parseFloat(localStorage.getItem("orderTotal")) || 0;

// Recalcular el total si no está disponible
if (!totalCalculated) {
  totalCalculated = cart.reduce(
    (acc, item) => acc + item.price * item.quantity,
    0
  );
}

// Función para mostrar los nombres de los platos y el total del pedido
function displayCartSummary() {
  const itemList = document.getElementById("item-list");
  const totalAmount = document.getElementById("total-amount");

  // Limpiar los elementos actuales del contenedor
  itemList.innerHTML = "";

  // Mostrar los nombres de los platos con la cantidad
  cart.forEach((item) => {
    const listItem = document.createElement("li");
    listItem.textContent = `${item.name} x${item.quantity}`; // Mostrar el nombre del plato con su cantidad
    itemList.appendChild(listItem);
  });

  // Mostrar el total ya calculado
  totalAmount.textContent = `Total del Pedido: $${totalCalculated.toLocaleString()}`;
}

// Ejecutar la función al cargar la página
document.addEventListener("DOMContentLoaded", displayCartSummary);

// Función para enviar el pedido al servicio web mediante POST
async function enviarPedido() {
  const orderDetails = {
    nombre: document.getElementById("name").value,
    telefono: document.getElementById("telefono").value,
    email: document.getElementById("email").value,
    direccion: document.getElementById("address").value,
    productos: cart.map((item) => ({
      id: item.id,
      cantidad: item.quantity,
      precio_unitario: item.price,
    })),
    totalPrice: totalCalculated,
  };

  console.log("Datos enviados:", orderDetails);

  // Guardar los detalles de la orden en localStorage para usarlos en confirmacion.js
  localStorage.setItem("orderDetails", JSON.stringify(orderDetails));

  try {
    const response = await fetch("/guardar-orden", {
      method: "POST",
      redirect: "follow",
      headers: {
        "Content-Type": "application/json", // Cambiar de "text/plain" a "application/json"
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), // Token CSRF
      },
      body: JSON.stringify({
        nombre: customerName,
        telefono: customerPhone,
        email: customerEmail,
        direccion: customerAddress,
        productos: cart,
        total: total, // Agregar el total calculado
      }),
    });
    

    if (!response.ok) {
      throw new Error(`Error en la solicitud: ${response.status}`);
    }
    alert("¡Pedido enviado correctamente!");
    window.open(confirmacionUrl, "_blank");
  } catch (error) {
    console.error("Error al enviar el pedido:", error);
    window.location.href = "/confirmacion";
    }
}

function finalizarCompra() {
  console.log("Finalizar Compra Iniciada");
  
  // Aquí puedes realizar acciones previas al envío, como validaciones
  enviarPedido(); // Llama a la función para enviar el pedido
}

// Manejador para el envío del formulario
document
  .getElementById("payment-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    enviarPedido();
  });
