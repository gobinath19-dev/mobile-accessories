  
    // Function to handle adding a product to the cart
    function addToCart(id, name, price) {
        // Get the existing cart items from localStorage or initialize an empty array
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        // Add the new item to the cart
        var newItem = { id: id, name: name, price: price };
        cartItems.push(newItem);

        // Store the updated cart items back to localStorage
        localStorage.setItem('cart', JSON.stringify(cartItems));

        // Optionally, display a confirmation message
        alert('Product added to cart.');
    }

    // Event listener for 'Add to Cart' buttons
    document.querySelectorAll('.add-to-cart').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var price = parseFloat(this.getAttribute('data-price'));
            addToCart(id, name, price);
        });
    });