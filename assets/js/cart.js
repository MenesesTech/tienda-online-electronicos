
// Cart
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart__container');
let closeCart = document.querySelector('#close-cart');

//  Open cart
cartIcon.onclick = () => {
    cart.classList.add("active");
};

// Close cart
closeCart.onclick = () => {
    cart.classList.remove("active");
};

// Cart Working JS
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

// Making Function
function ready() {
    var removeCartButtons = document.getElementsByClassName('cart-remove');
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
    // Buy button work
    document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);
}
// Buy button
function buyButtonClicked() {
    alert('Tu pedido se ha realizado con éxito');
    var cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updatetotal()
}

//  Remove Items From Cart
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
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
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
    addProductCart(title, price, productImg);
    updatetotal();

    // Abre el carrito después de agregar un producto
    cart.classList.add("active");
}

function addProductCart(title, price, productImg) {
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText === title) {
            alert("Ya has añadido este artículo al carrito.");
            return;
        }
    }

    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');
    
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- Remove Cart -->
        <i class="ri-delete-bin-7-fill cart-remove"></i>
    `;

    cartShopBox.innerHTML = cartBoxContent;

    document.getElementsByClassName("cart-content")[0].append(cartShopBox);

    cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);

    updatetotal();
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
