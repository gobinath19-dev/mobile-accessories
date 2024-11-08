var orderItems = JSON.parse(localStorage.getItem('order')) || [];
var orderContainer = document.getElementById('order-items');
var totalContainer = document.getElementById('total').getElementsByTagName('span')[0];

function updateOrderDisplay() {
    orderContainer.innerHTML = '';
    totalContainer.textContent = calculateTotal().toFixed(2);

    if (orderItems.length === 0) {
        orderContainer.innerHTML = "<p>Your order is empty.</p>"; 
    } else {
        orderItems.forEach(function(item, index) {
            orderContainer.innerHTML += "<div class='item'><p>" + item.name + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ₹" + item.price.toFixed(2) + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class='delete-item' data-index='" + index + "'>Cancel</button></p></div>";
        });
    }
}

function calculateTotal() {
    return orderItems.reduce(function(total, item) {
        return total + item.price;
    }, 0);
}

// Event listener for deleting an item
orderContainer.addEventListener('click', function(event) {
    if (event.target.classList.contains('delete-item')) {
        var index = event.target.getAttribute('data-index');
        orderItems.splice(index, 1);
        localStorage.setItem('order', JSON.stringify(orderItems));
        updateOrderDisplay();
    }
});

updateOrderDisplay();
