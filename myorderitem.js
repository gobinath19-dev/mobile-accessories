document.querySelector('.add-to-order').addEventListener('click', function() {
    addToOrder(this.getAttribute('data-id'), this.getAttribute('data-name'), parseFloat(this.getAttribute('data-price')));
});

function addToOrder(id, name, price) {
    var orderItems = JSON.parse(localStorage.getItem('order')) || [];
    var newItem = { id: id, name: name, price: price };
    orderItems.push(newItem);
    localStorage.setItem('order', JSON.stringify(orderItems));
    // alert('Product added to order.');
}