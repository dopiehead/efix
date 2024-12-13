
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php';     ?>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/overlay.css">

    <title>Home</title>
</head>
<body>
<?php include 'components/marquee.php'; ?>


<?php include 'components/overlay.php'; ?>

<?php include 'components/hero-section.php'; ?>

<br><br>

<?php include 'components/calltoaction.php'; ?>

<br><br>

 <!-- <div class='container'>

       <h5 class='fw-bold mb-5 mt-4'>Service Providers</h5>

         <div class='service_providers'>

              <div class='provider-content'>

              </div>


         </div>


 </div> -->

 <br><br>

 <div class='container'>



 <div class='d-flex heading'>

 <h6 class='fw-bold fs-3'>Cities with E-fix Services</h6>

 <span class='text-success fs-6'><a href='services.php'>Show more <i class='fa fa-chevron-right'></i></a></span>

 </div>
 
<br>


 <div class='area'>

 <?php 

require_once 'engine/connection.php';

// Adjusted query to count each unique state
$states = mysqli_query($con, "SELECT state, COUNT(*) AS count FROM states_in_nigeria GROUP BY state LIMIT 5");

while ($row = mysqli_fetch_assoc($states)) {
    echo "<div class='states text-capitalize'>
         <div class='flex-row flex-column text-center'>
        <h6><a class='text-white' href='location-services.php?id=" . urlencode($row['state']) . "'>" . htmlspecialchars($row['state']) . "</a></h6>
        <span>" . htmlspecialchars($row['count']) . "</span>
        </div>
    </div>";
}

?>

</div>



<div class='container mt-5'>

<h6 class='fw-bold mb-4 fs-2'>Book A Service</h6>

<div>
     
      <div class='services'>
          
          <div>
              

               <img src="assets/icons/information-technology.png" alt="efix">

               <span><a>information technology</a> </span>

          </div>


          <div>
             
              <img src="assets/icons/electrical.png" alt="efix">

              <span><a>inverter services</a></span>
          
         </div>

         
         <div>
             
             <img src="assets/icons/ac.png" alt="efix">

             <span><a>Ac</a></span>
         
        </div>

           
        <div>
             
             <img src="assets/icons/mechanics.png" alt="efix">
             
             <span><a>mechanic</a> </span>

         </div>
         

         <div>
             
          <img src="assets/icons/make-up.png" alt="efix"> 

          <span><a>Makeup Artists</a> </span>
          
         </div>
          


         <div>
           <img src="assets/icons/vulganizer.png" alt="efix">

           <span><a>vulganizer</a></span>

         </div>


         
         <div>
           <img src="assets/icons/car-wash.png" alt="efix">

           <span><a>Car Wash</a></span>

         </div>


         
         <div>
           <img src="assets/icons/pet-service.png" alt="efix">

           <span><a>Pet Service</a></span>

         </div>


         
         <div>
           <img src="assets/icons/counselling.png" alt="efix">

           <span><a>Counseling</a></span>

         </div>


         <div>
            
           <img src="assets/icons/cleaning.png" alt="efix">

           <span><a>Cleaning</a></span>

         </div>


         
         <div>
            
           <img src="assets/icons/hairdressers.png" alt="efix">

           <span><a>Hairdressers</a></span>

         </div>



         <div>
            
            <img src="assets/icons/wellness.png" alt="efix">
 
            <span><a>Wellness</a></span>
 
          </div>

      </div>

   </div>

</div>



<br><br>

<div class='container products'>
 
      <h5 class='fw-bold'>Products</h5>

      <div class='product-content'></div>
      
</div>


<br><br>


<?php include 'components/banner.php'; ?>

<br><br>


<div class='charges-banner'>


      <div class="bgB">

        <div class='A'>
          
        <span style=' visibility:hidden'>hello</span>
         
        <h6 class='fw-bold text-dark'>Call out and labour charger</h6>

        <a class='text-white text-decoration-none border-0 px-5 py-2 fs-4 fw-bold bg-primary rounded mt-2' href="charges.php">View</a>

        </div>
         

      </div>



           <div>

                <img src="assets/img/scissors.png">


          </div>


       </div>


    </div>


</div>


<!------------------------------------------btn-scroll--------------------------------------------------->

<a class=" btn-down" onclick="topFunction()">&#8593;</a>


<br><br>

<!-----------------------------------------Footer--------------------------------------------------->

<?php include 'components/footer.php'; ?>

<script>
// $(document).ready(function() {

//     $.ajax({
//         type: "GET",
//         url: "https://estores.ng/deals-api.php",
//         dataType: "json",
//         success: function(data) {
           
//             let deals = data.length;

//             for (let i = 0; i < deals; i++) {
//                 let users = data[i];
//                 let provider_id = users.id;
//                 let provider_speciality = users.sp_speciality;
//                 let provider_image = users.sp_category_img;

//                 let image_url = 'https://estores.ng/' + provider_image;

//                 let provider_html = `
//                 <div class='provider-info'>
//                 <div class='provider-list'>
                    
//                     <div class='rounded rounded-circle'>
//                         <img class='provider_img rounded rounded-circle' src='${image_url}' alt='${provider_speciality}'>
//                     </div>
//                     <div class='text-dark text-center text-capitalize'>
//                         ${provider_speciality}
//                     </div>
                    
//                     <div class='text-dark text-center'>1</div>


//                  </div>
//                 </div>`;

//                 $(".provider-content").append(provider_html);
//             }

//             // Initialize Flickity after the content is appended
//             $('.provider-content').flickity({
//                 cellAlign: 'left',
//                 contain: true,               
//                 prevNextButtons:false,
//                 pageDots: false,
//                 autoPlay: 3000,
//                 pauseAutoPlayOnHover: true
//             });
//         },
//         error: function(err) {
//             console.log(err);
//         }
//     });

// });
</script>


<script>

$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "https://estores.ng/products-api.php",
        dataType: "json",
        success: function(response) {
             
            let product_html = '<div class="package-container">'; // Start the container

            let products = response.length;
            for (let i = 0; i < products; i++) {
                let product = response[i];
                let product_id = product.id;
                let product_name = product.product_name;
                let product_category = product.product_category;
                let product_image = product.product_image;
                let product_location = product.product_location;
                let product_price = product.product_price;

                let image_url = 'https://estores.ng/' + product_image;
                
                // Create product HTML
                product_html += `
                <div class='package'>
                    <div class='imgitem'><img id='imgitem' src='${image_url}' alt='${product_name}'></div>
                    <span id="nameitem"><a href="#">${product_name}</a></span>
                    <span id='priceitem'>${product_price}</span>
                    <div class='d-flex justify-content-space-between align-items-center g-5'>
                          <span id='locitem'>${product_location}</span>
                          <span class='share'><i class='fas fa-share-alt'></i></span>
                          <span class='cart-outline'><i class='fas fa-shopping-cart'></i></span>
                  </div>
                </div>`;
            }

            product_html += "</div>"; // Close the container
            $(".product-content").append(product_html); // Append the complete HTML to the container
        },
        error: function(xhr, status, error) {
            console.error("Error fetching products:", error);
            // Optionally, you can display an error message to the user
        }
    });
});
</script>


<script>

$('.area').flickity({
                cellAlign: 'left',
                contain: true,               
                prevNextButtons:false,
                pageDots: false,
                autoPlay: 3000,
                pauseAutoPlayOnHover: true
            });

</script>

</body>
</html>