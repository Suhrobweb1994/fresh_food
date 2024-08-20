
document.addEventListener("DOMContentLoaded", function() {
    // Mock data
    const items = [
        {id: 1, name: "Pizza", description: "A delicious slice of pizza.", price: "$3.00"},
        {id: 2, name: "Burger", description: "Juicy beef burger.", price: "$5.00"},
        // More items
    ];

    // Display items
    const foodItemsSection = document.getElementById('food-items');
    items.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('food-item');
        itemDiv.innerHTML = `
            <h3>${item.name}</h3>
            <p>${item.description}</p>
            <p><strong>${item.price}</strong></p>
            <button onclick="addToCart(${item.id})">Add to Cart</button>
        `;
        foodItemsSection.appendChild(itemDiv);
    });
});

function addToCart(itemId) {
    alert('Item added to cart: ' + itemId);
}
