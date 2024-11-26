import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
document.addEventListener("DOMContentLoaded", () => {
    const menuItemsContainer = document.getElementById("menu-items");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const checkoutBtn = document.getElementById("checkout-btn");
    let cart = [];
    let allMenuItems = []; // Almacena todos los productos del menú

    // Función para cargar todos los productos desde Laravel
    function loadMenuItems() {
        fetch('http://127.0.0.1:8000/api/menu', { method: 'GET' })
            .then(response => response.json())
            .then(data => {
                allMenuItems = data; // Guarda los datos recibidos
                displayMenuItems(allMenuItems, 'platos-principales'); // Por defecto, muestra "platos-principales"
            })
            .catch(error => console.error('Error al cargar los productos:', error));
    }

    // Función para mostrar productos filtrados por categoría
    function displayMenuItems(menuItems, category) {
        menuItemsContainer.innerHTML = "";
        const filteredItems = menuItems.filter(item => item.category === category);

        if (filteredItems.length === 0) {
            menuItemsContainer.innerHTML = "<p>No hay productos disponibles en esta categoría.</p>";
        } else {
            filteredItems.forEach(item => {
                const menuItemDiv = document.createElement("div");
                menuItemDiv.classList.add("menu-item");
                menuItemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <h3>${item.name}</h3>
                    <p>${item.description}</p>
                    <p>Precio: $${parseFloat(item.price).toFixed(2)}</p>
                    <button class="add-to-cart-btn">Agregar al Carrito</button>
                `;
                menuItemDiv.querySelector(".add-to-cart-btn").addEventListener("click", () => {
                    addToCart(item);
                });
                menuItemsContainer.appendChild(menuItemDiv);
            });
        }
    }

    // Función para agregar productos al carrito
    function addToCart(item) {
        let found = false;
        cart.forEach(cartItem => {
            if (cartItem.id === item.id) {
                cartItem.quantity += 1;
                found = true;
            }
        });

        if (!found) {
            item.quantity = 1;
            cart.push(item);
        }

        updateCart();
    }

    // Función para eliminar productos del carrito
    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCart();
    }

    // Función para actualizar el carrito visualmente
    function updateCart() {
        cartItemsContainer.innerHTML = "";
        let total = 0;

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = "<p>El carrito está vacío.</p>";
        } else {
            cart.forEach((item, index) => {
                const cartItemDiv = document.createElement("div");
                cartItemDiv.classList.add("cart-item");
                let itemTotal = item.price * item.quantity;
                total += itemTotal;
                cartItemDiv.innerHTML = `
                    <p>${item.name} x${item.quantity} - $${itemTotal.toFixed(2)}</p>
                    <button class="remove-from-cart-btn">Eliminar</button>
                `;
                cartItemDiv.querySelector(".remove-from-cart-btn").addEventListener("click", () => {
                    removeFromCart(index);
                });
                cartItemsContainer.appendChild(cartItemDiv);
            });
        }

        cartTotal.textContent = total.toFixed(2);
    }

    // Evento para realizar el pedido
    checkoutBtn.addEventListener("click", (event) => {
        event.preventDefault();
        const customerName = document.getElementById("name").value;
        const customerPhone = document.getElementById("phone").value;
        const customerAddress = document.getElementById("address").value;

        if (!customerName || !customerPhone || !customerAddress || cart.length === 0) {
            alert("Por favor, completa todos los campos y añade productos al carrito.");
            return;
        }

        const orderData = {
            customer: {
                name: customerName,
                phone: customerPhone,
                address: customerAddress,
            },
            items: cart.map(item => ({
                id: item.id,
                name: item.name,
                price: item.price,
                quantity: item.quantity,
            })),
            total: parseFloat(cartTotal.textContent),
        };

        fetch('http://127.0.0.1:8000/api/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(orderData),
        })
            .then(response => {
                if (response.ok) {
                    alert("Pedido realizado con éxito.");
                    cart = [];
                    updateCart();
                } else {
                    alert("Error al realizar el pedido.");
                }
            })
            .catch(error => console.error('Error al realizar el pedido:', error));
    });

    // Cargar productos al iniciar la página
    loadMenuItems();

    // Eventos para cambiar de categoría
    document.getElementById('entradas-btn').addEventListener('click', () => {
        displayMenuItems(allMenuItems, 'entradas');
    });
    document.getElementById('platos-principales-btn').addEventListener('click', () => {
        displayMenuItems(allMenuItems, 'platos-principales');
    });
    document.getElementById('bebidas-btn').addEventListener('click', () => {
        displayMenuItems(allMenuItems, 'bebidas');
    });
    document.getElementById('postres-btn').addEventListener('click', () => {
        displayMenuItems(allMenuItems, 'postres');
    });
});
