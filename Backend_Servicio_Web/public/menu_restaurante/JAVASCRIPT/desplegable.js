function toggleDesplegable() {
  const sliderContainer = document.getElementById("slider-container");
  const overlay = document.getElementById("overlay");
  const iframe = document.getElementById("desplegable-iframe");

  // Verifica el estado actual de display del slider y del overlay
  if (sliderContainer.style.display === "block") {
    sliderContainer.style.display = "none";
    overlay.style.display = "none";
    document.body.style.overflow = ""; // Permitir scroll nuevamente
  } else {
    // Mostrar el desplegable y notificar al iframe para actualizar el carrito
    sliderContainer.style.display = "block";
    overlay.style.display = "block";
    document.body.style.overflow = "hidden"; // Prevenir scroll en el fondo

    // Envía un mensaje al iframe para actualizar los elementos del carrito
    iframe.contentWindow.postMessage({ action: 'updateCart' }, '*');
  }
}

// Escuchar el mensaje para actualizar el carrito
window.addEventListener('message', (event) => {
  if (event.data.action === 'updateCart') {
    renderCartItems();
  }
});


function finalizarCompra() {
  // Usa la variable global definida en el archivo Blade
  if (typeof carritoUrl !== 'undefined') {
    window.open(carritoUrl, "_blank");
  } else {
    console.error("URL de carrito no definida");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  renderCartItems();
});

function renderCartItems() {
  console.log("Renderizando elementos del carrito");

  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const cartItemsContainer = document.getElementById("cart-items");

  if (!cartItemsContainer) {
      console.error("No se encontró el contenedor de elementos del carrito");
      return;
  }

  cartItemsContainer.innerHTML = ""; // Limpia el contenido previo

  if (cart.length === 0) {
      cartItemsContainer.innerHTML = "<p>Tu carrito está vacío.</p>";
      return;
  }

  cart.forEach((item, index) => {
      const itemElement = document.createElement("div");
      itemElement.classList.add("item");

      const imagePath = `/menu_restaurante/Imagenes/Menu/${item.image}`;
      console.log(`Producto: ${item.name}, Ruta de imagen generada: ${imagePath}`);

      itemElement.innerHTML = `
          <div class="item-details">
              <img src="${imagePath}" alt="${item.name}">
              <div>
                  <h2>${item.name}</h2>
              </div>
          </div>
          <div class="item-price">
              <p>${formatPrice(item.price * item.quantity)}</p>
              <div class="quantity-control">
                  <button onclick="updateQuantity(${index}, -1)">-</button>
                  <span>${item.quantity}</span>
                  <button onclick="updateQuantity(${index}, 1)">+</button>
              </div>
              <a href="#" class="remove" onclick="removeItem(${index})">Eliminar</a>
          </div>
      `;
      cartItemsContainer.appendChild(itemElement);
  });

  updateSummary(); // Asegúrate de que esta función esté correctamente implementada
}

// Función auxiliar para formatear precios
function formatPrice(price) {
  return `$${price.toFixed(2)}`; // Si se requiere otro formato, ajusta aquí
}

function updateQuantity(index, delta) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  if (cart[index].quantity + delta > 0) {
    cart[index].quantity += delta;
  } else {
    cart.splice(index, 1);
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  renderCartItems();
}

function removeItem(index) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.splice(index, 1);
  localStorage.setItem("cart", JSON.stringify(cart));

  // Notificar a la ventana principal para actualizar el carrito
  window.parent.postMessage({ action: 'syncCart', cart }, '*');

  // Renderizar el carrito en el iframe
  renderCartItems();
}

function formatPrice(amount) {
  const [integerPart, decimalPart] = amount.toFixed(2).split(".");
  const formattedIntegerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return `$${formattedIntegerPart},${decimalPart}`;
}

function updateSummary() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  let total = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
  let taxes = total * 0.19;
  let subtotal = total - taxes;

  document.getElementById("subtotal").innerText = formatPrice(subtotal);
  document.getElementById("tax").innerText = formatPrice(taxes);
  document.getElementById("total").innerText = formatPrice(total);
}
