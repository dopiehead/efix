<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/product-deals.css">
    <title>Product deals</title>

</head>
<body>
     <div>
     <?php include 'components/overlay-inner.php'; ?>
     <br><br>

     <?php include 'components/calltoaction.php'; ?>

     <br><br>

         <div class='container'>

             <div class='row'>

                  <div class='col-md-3 mb-5'>
                    
                     <h6 class='fw-bold mb-4'>Categories</h6>

                     <div class='product-category'>



                     </div>
                 

                  </div>



               
                  <div class = 'col-md-9'>
                    
                     <div class="product-header">
                     <h6 class='fw-bold'>Trending Products</h6>
                     <button style='font-size:13px;' class='btn btn-secondary text-white border-0 rounded text-sm' id="sort-button">Sort Product by price</button>
                     </div>
                     <br>
                       <div class='product-content mt-5'></div>

               
                  </div>






             </div>









         </div>



     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class=" btn-down" onclick="topFunction()">&#8593;</a>


     <br><br>
     <?php include 'components/footer.php'; ?>
     </div> 




     <script>
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "https://estores.ng/api/categories.php",
        dataType: "json",
        success: function(response) {

            let categories = response.data.length;
            console.log((response));
     
            for (let i = 0; i < categories; i++) {
                let category = response.data[i];
                // let product_id = category.id;
                let product_category = category.product_category; 
                let product_count = category.count;                             
                              
                // Create product HTML
                let category_html = `
                    <div class='mt-1'>
                        <div class='d-flex flex-row flex-column w-100 text-capitalize'>
                            <div class='d-flex justify-content-start align-items-center'>
                                <span class='fw-normal text-sm'><a id='${product_category}'>${product_category}</a>(${product_count})</span>

                            </div>
                        </div>
                    </div>`;
                
                // Append each category HTML to the container
                $(".product-category").append(category_html);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching products:", error);
            // Optionally, display an error message to the user
        }
    });
});
</script>


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