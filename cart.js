
var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
var cartContainer = document.getElementById('cart-items');
var totalContainer = document.getElementById('total').getElementsByTagName('span')[0];

function updateCartDisplay() {
    cartContainer.innerHTML = '';
    totalContainer.textContent = calculateTotal().toFixed(2);

    if (cartItems.length === 0) {
        cartContainer.innerHTML = "<p>Your cart is empty.</p>"; 
    } else {
        cartItems.forEach(function(item, index) {
            cartContainer.innerHTML += "<div class='item'><p>&nbsp;&nbsp;&nbsp;&nbsp;" + item.name + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹" + item.price.toFixed(2) + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><button class='delete-item' data-index='" + index + "'>Delete</button></div>";
        });
    }
}

function calculateTotal() {
    return cartItems.reduce(function(total, item) {
        return total + item.price;
    }, 0);
}

// Event listener for deleting an item
cartContainer.addEventListener('click', function(event) {
    if (event.target.classList.contains('delete-item')) {
        var index = event.target.getAttribute('data-index');
        cartItems.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cartItems));
        updateCartDisplay();
    }
});

updateCartDisplay();
