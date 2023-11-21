function addToCart(product_id, product_name, product_price) {
    var notificationContainer = document.getElementById('cart-notification-container');
    var notification = document.getElementById('cart-notification');

    // Update notification content
    notification.innerHTML = 'Item added to cart: ' + product_name;


    notificationContainer.style.display = 'block';

  
    setTimeout(function () {
    
        notificationContainer.style.display = 'none';


        notification.innerHTML = '';
    }, 3000);

    console.log("Data to be sent:", JSON.stringify({
        id: product_id,
        name: product_name,
        price: product_price
    }));
 
    $.ajax({
        type: 'POST',
        url: 'http://localhost/webdev/SpectriX/customer/add_to_cart.php',
        data: JSON.stringify({
            id: product_id,
            name: product_name,
            price: product_price
        }),
        contentType: 'application/json',
        success: function(response) {
            // Handle the response if needed
            console.log(response);
        },
        error: function(error) {
            console.error('Error adding item to cart:', error);
        }
    });
}
