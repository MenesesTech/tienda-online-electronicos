var productosEnCarrito = [];
var itemsInCart = [];
// Cart
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart__container');
let closeCart = document.querySelector('#close-cart');
const body = document.body;

//  Open cart
cartIcon.addEventListener('click', (event) => {
    event.preventDefault();
    cart.classList.add('active');
    cartContainer.style.right = '0';
    body.classList.add('no-scroll');
});

// Close cart
closeCart.addEventListener('click', (event) => {
    event.preventDefault();
    cart.classList.remove('active');
    cartContainer.style.right = '-100%';
    body.classList.remove('no-scroll');
});

// Cart Working JS
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

// Making Function
function ready() {
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    // quantity changes
    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }

    // Add to cart
    var addCart = document.getElementsByClassName("add-cart");
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    }
    if (localStorage.getItem("cartItems")) {
        document.querySelector(".cart-content").innerHTML = localStorage.getItem("cartItems");
        // Asignar eventos a los elementos del carrito cargados desde el localStorage
        assignEventsToCartItems();
        updatetotal();
    }
    // Buy button work
    document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);
}

function buyButtonClicked() {
    if (isLoggedIn) {
        // Aquí es donde recorres cada elemento en el carrito para obtener la información
        var cartItems = document.getElementsByClassName('cart-box');
        itemsInCart = [];

        console.log("Número de elementos en el carrito:", cartItems.length); // Verificar la cantidad de elementos en el carrito

        for (var i = 0; i < cartItems.length; i++) {
            var cartBox = cartItems[i];
            var productId = cartBox.getAttribute('data-product-id');
            var quantity = cartBox.querySelector('.cart-quantity').value;
            var title = cartBox.querySelector('.cart-product-title').innerText;

            console.log("Producto ID:", productId); // Verificar el ID del producto
            console.log("Cantidad:", quantity); // Verificar la cantidad
            console.log("Título:", title); 

            itemsInCart.push({
                id: productId,
                title: title,
                quantity: quantity
            });
        }
        // Guardar itemsInCart antes de limpiar el carrito
        localStorage.setItem("itemsInCart", JSON.stringify(itemsInCart));
        // Haces lo que necesites con el array 'itemsInCart' que ahora incluye la cantidad
        console.log("Items en el carrito:");
        itemsInCart.forEach(item => {
            console.log(item);
        });


        // Limpia el carrito después de procesar la información
        var cartContent = document.getElementsByClassName('cart-content')[0];
        while (cartContent.hasChildNodes()) {
            cartContent.removeChild(cartContent.firstChild);
        }
        updatetotal();
        // Limpia el carrito después de procesar la información y envía datos a cart-register.php
        localStorage.removeItem('cartItems');
        window.location.href = 'cart-register.php?itemsInCart=' + encodeURIComponent(JSON.stringify(itemsInCart));

    } else {
        window.location.href = 'login.php';
    }
}


//  Remove Items From Cart
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateLocalStorage(); // Agregar esta función para actualizar el localStorage
    updatetotal();
}

// Quantity changed
function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatetotal();
}

// Add to cart
function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.closest('.product-box');
    var title = shopProducts.querySelector('.product-title').innerText;
    var price = shopProducts.querySelector('.price').innerText;
    var productImg = shopProducts.querySelector('.product-img').src;
    var productoId = button.getAttribute('data-producto-id');
    addProductCart(title, price, productImg, productoId);
    var cartContent = document.querySelector(".cart-content").innerHTML;
    localStorage.setItem("cartItems", cartContent);
    updatetotal();
    // Abre el carrito después de agregar un producto
    cart.classList.add("active");
}

function addProductCart(title, price, productImg, productoId) {
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");

    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText === title) {
            return;
        }
    }

    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');
    cartShopBox.setAttribute('data-product-id', productoId);

    var cantidad = 1; // Establecer la cantidad inicial
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="${cantidad}" class="cart-quantity"> <!-- Establecer el valor inicial de la cantidad -->
        </div>
        <!-- Remove Cart -->
        <i class="ri-delete-bin-7-fill cart-remove"></i>
    `;

    cartShopBox.innerHTML = cartBoxContent;

    document.getElementsByClassName("cart-content")[0].append(cartShopBox);

    cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);
    var quantityInput = cartShopBox.getElementsByClassName('cart-quantity')[0];
    quantityInput.addEventListener('change', function (event) {
        cantidad = parseInt(event.target.value); // Actualizar la cantidad al cambiar

        // Actualizar productosEnCarrito
        var foundProduct = productosEnCarrito.find(product => product.id === productoId);
        if (foundProduct) {
            foundProduct.quantity = cantidad;
        } else {
            productosEnCarrito.push({
                id: productoId,
                title: title,
                price: price,
                image: productImg,
                quantity: cantidad
            });
        }

        // Actualizar itemsInCart
        var foundItem = itemsInCart.find(item => item.id === productoId);
        if (foundItem) {
            foundItem.quantity = cantidad;
        } else {
            itemsInCart.push({
                id: productoId,
                title: title,
                quantity: cantidad
            });
        }

        updateLocalStorage();
        updatetotal();
    });
}

// Función para actualizar la cantidad en productosEnCarrito
function updateCantidadInProductosEnCarrito(productId, newQuantity) {
    for (var i = 0; i < productosEnCarrito.length; i++) {
        if (productosEnCarrito[i].id === productId) {
            productosEnCarrito[i].quantity = newQuantity; // Actualizar la cantidad en productosEnCarrito
            break;
        }
    }
}

// Update Total
function updatetotal() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace("S/.", ""));
        var quantity = quantityElement.value;
        total += price * quantity;
    }

    // Redondear a 2 decimales
    total = Math.round(total * 100) / 100;

    document.getElementsByClassName("total-price")[0].innerText = "S/." + total;
};

function updateLocalStorage() {
    var cartContent = document.querySelector(".cart-content").innerHTML;
    localStorage.setItem("cartItems", cartContent);
}

// Función para asignar eventos a los elementos del carrito
function assignEventsToCartItems() {
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
}
