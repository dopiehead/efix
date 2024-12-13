<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Cart</title>
</head>
<body>
    <?php include 'components/overlay-inner.php'; ?>
  
    <div class="d-flex justify-content-center align-items-center vh-90">
  <div class="container text-center">
    <div class="card shadow p-5 border-0 rounded-4">
      <div class="d-flex flex-column align-items-center">
        
        <!-- Image Placeholder -->
        <div class="rounded-circle bg-light d-flex justify-content-center align-items-center mb-3" style="width: 80px; height: 80px;">
          <img src="assets/img/cart-image.png" alt="Cart Icon" class="img-fluid" style="max-width: 60%;">
        </div>
        
        <!-- Cart Message -->
        <h6 class="fs-5 fw-semibold text-dark mb-2">Your Cart is Empty</h6>
        <p class="text-muted mb-4">Add some items to your cart to proceed.</p>
        
        <!-- Continue Shopping Button -->
        <a href="index.php" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" style="transition: background 0.3s ease;">
          Continue Shopping
        </a>
      </div>
    </div>
  </div>
</div>

     </div>

     <!-- product listings -->

     <div class="mt-5 container">

           <h5 class='fw-bold mt-2 mb-4'>Products</h5>

           <div class='product-content'></div>

     
     </div>

               <!------------------------------------------btn-scroll--------------------------------------------------->

       <a class=" btn-down" onclick="topFunction()">&#8593;</a>

     <br><br>

     <?php include 'components/footer.php'; ?>
     
     <script>
$(document).ready(function() {
    let products = []; // Array to hold the fetched products

    // Function to fetch products
    function fetchProducts() {
        $.ajax({
            type: "GET",
            url: "https://estores.ng/products-api.php",
            dataType: "json",
            success: function(response) {
                products = response; // Store the fetched products
                displayProducts(products); // Display the products
            },
            error: function(xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });
    }

    // Function to display products
    function displayProducts(products) {
        let product_html = '<div class="package-container">'; // Start the container

        products.forEach(product => {
            let image_url = 'https://estores.ng/' + product.product_image;
            product_html += `
                <div class='package'>
                    <div class='imgitem'><img id='imgitem' src='${image_url}' alt='${product.product_name}'></div>
                    <span class="nameitem"><a href="#">${product.product_name}</a></span>
                    <span id='priceitem'>${product.product_price}</span>
                    <div class='d-flex justify-content-space-between align-items-center g-5 w-100'>
                    <div>
                    <span class='locitem'>${product.product_location}</span>
                    </div>
                    <div>
                    <span class='share'><i class='fas fa-share-alt'></i></span>
                    <span class='cart-outline'><i class='fas fa-shopping-cart'></i></span>
                    </div>
                    </div>
                </div>`;
        });

        product_html += "</div>"; // Close the container
        $(".product-content").html(product_html); // Append the complete HTML to the container
    }

    // Function to sort products by price
    function sortProducts() {
        products.sort((a, b) => parseFloat(a.product_price) - parseFloat(b.product_price)); // Sort by price
        displayProducts(products); // Re-display the sorted products
    }

    // Fetch products on page load
    fetchProducts();

    // Attach click event to the sort button
    $("#sort-button").click(function() {
        sortProducts(); // Call the sort function when button is clicked
    });
});
</script>
    
</body>
</html>