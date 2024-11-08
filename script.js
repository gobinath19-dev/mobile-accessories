let cart = [];
let totalAmount = 0;

function addToCart(name, price) {
  cart.push({ name, price });
  totalAmount += price;
  displayCart();
}

function removeFromCart(index, price) {
  cart.splice(index, 1);
  totalAmount -= price;
  displayCart();
}

function displayCart() {
  const cartElement = document.getElementById("cart");
  cartElement.innerHTML = "";
  cart.forEach((item, index) => {
    const li = document.createElement("li");
    li.textContent = `${item.name} - $${item.price}`;
    const removeBtn = document.createElement("button");
    removeBtn.textContent = "Remove";
    removeBtn.onclick = () => removeFromCart(index, item.price);
    li.appendChild(removeBtn);
    cartElement.appendChild(li);
  });
  
  const totalElement = document.getElementById("totalAmount");
  totalElement.textContent = totalAmount.toFixed(2); // Display total with 2 decimal places
}