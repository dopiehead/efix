<?php session_start(); 
 
 error_reporting(E_ALL ^ E_NOTICE);
 require 'engine/config.php'; 

if(isset($_POST["submit"]))   {  
    if(!empty($_POST["search"]))   {  
    $query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
    header("location:search-process.php?search=" .$query); 
   }  

 }  

 ?> 

<?php { ?>

<input type="hidden" id='mylongitude'>
<input type="hidden" id='mylatitude'>


<?php
session_start(); // Start the session to access session variables

function getAddressFromCoordinates($latitude, $longitude) {
    // Replace YOUR_OPENCAGE_API_KEY with your OpenCage API key
    $apiKey = 'a066b39ac06a4ef98fbfe9368f1f8182'; // Replace with your OpenCage API key
    $url = "https://api.opencagedata.com/geocode/v1/json?q=$latitude+$longitude&key=$apiKey&language=en";

    // Suppress errors for file_get_contents and handle them manually
    $response = @file_get_contents($url);

    // Check if the request was successful
    if ($response === FALSE) {
        // return "Error: Unable to retrieve location data.";
    }

    // Decode the JSON response
    $responseData = json_decode($response);

    // Check if the response is valid
    if ($responseData && $responseData->status->code == 200 && isset($responseData->results[0])) {
        // Get the formatted address from the response
        $address = $responseData->results[0]->formatted;
        return $address;
    } else {
        return "Address not found!";
    }
}

// Check if latitude and longitude are set in session
if (isset($_SESSION['latitude']) && isset($_SESSION['longitude'])) {

    $latitude = $_SESSION['latitude'];

    $longitude = $_SESSION['longitude'];

    // Get the address from coordinates
    $address = getAddressFromCoordinates($latitude, $longitude);

   $myaddress =  $address;

   $_SESSION['address'] = $myaddress;

} else {
    // echo "Latitude and/or Longitude are not set in session.";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php';     ?>
    <link rel="stylesheet" href="assets/css/index-new.css">
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Homepage</title>
</head>
<body class='bg-light'>

<?php include 'components/marquee.php'; ?>
 
<div class='nav'>

     <div>

          <a href='index.php'><img src='assets/img/logo.png'></a>
         
     </div>


      <div class='search-bar'>

           <form method='post' action="">

                 <input type="text" name='search' placeholder="Search for service providers" class='bg-white rounded rounded-pill border-0 py-2 px-1'>
                 <button name='submit' class='btn btn-dark text-white rounded rounded-pill'>Search</button>

           </form>
      </div>

     <ul class='link-container fw-bold'>

          <li><a href='service-providers.php'>Service providers</a></li>

          <li><a href='charges.php'>Call out charges</a></li>

          <li><a href='https://estores.ng/login.php?details=postadvert.php'>Sell a product</a> </li> 

     </ul>

     <div class='create-container'>
       
     <?php if(isset($_SESSION['id']) || isset($_SESSION['sp_id'])) { ?> 

     <span><a class='px-2 py-1 login-button rounded ' href='dashboard/profile.php'><i class='fa fa-user-alt'></i></a></span>

     <?php } else {?>

      <span><a class='px-2 py-1 login-button rounded ' href='login.php'>Login</a></span>

      <span><a class=' bg-warning text-white rounded px-2 py-1' href='sign-up.php'>Sign up</a></span>

      <?php } ?>

     </div>

     <div class='open-nav'>
       
         <div class="menu-icon text-white">
               <div class="bar bar1"></div>
               <div class="bar bar2"></div>
               <div class="bar bar3"></div>

         </div>

     </div>


</div>

<!-- start of mobile overlay -->


<div id="myform" class="overlay overlayParent">

    <div class="overlay-content">

         <a href='service_providers.php' class='text-white'>Service providers</a>

         <a class='text-white' href='charges.php'>Call out charges</a>

         <a class='text-white' href='profile.php'>Sell a product</a>  

           <?php if(isset($_SESSION['id']) || isset($_SESSION['sp_id'])) { ?>

            <a class='text-white fw-bold' href='dashboard/profile.php'><i class='fa fa-user-alt'></i></a>  

            <?php } else { ?>

          <a class='text-white fw-bold' href='login.php'>Login</a>
 
          <a class='text-white' href="join-us.php"><span class=' rounded rounded-pill px-3 py-1 bg-danger w-75 fw-bold'>Sign up</span></a>
          <?php }  ?>
     </div>

</div>

<!-- end of header/navigation -->


     <div class='container bg-section'>

        <div class='bg-text mt-4 pt-3 ' data-aos='fade-left' data-aos-easing="linear"  data-aos-duration="1500">

              <span class='text-warning  bg-white rounded rounded-pill py-1 px-2'>READY TO HELP YOU !</span><br><br>

              <h1 class='fw-bold'>The best solution for every house problem</h1>

              <p class='text-secondary'>Our open, positive and proactive approach helps us find ways to align your work environment with the children</p><br>

              <div class='button-container'>
            
                  <a href='service-providers.php' class='rounded rounded-pill px-2 py-1 fw-bold  text-center'>Book now</a>

                 <a href='about.php' class='rounded rounded-pill btn-read px-2 py-1 text-secondary  text-center'>Read more</a>
        
             </div>

         </div>

         <div class='bg-img' data-aos='fade-right 'data-aos-easing="linear"
        data-aos-delay='1000' >

             <img src="assets/img/hero.png" alt="efix">
  
         </div>


     </div>


<!-- body part -->
<div class='about-home'>

 <div class='container about-section'  data-aos='fade-up' data-aos-transition="ease-in-out">

     <div class=' d-flex bg-warning text-white text-center flex-column flex-row' >
         <span><i class='fa fa-check fa-2x'></i></span>
         <span>Professional Expertise</span>

     </div>


     <div class=' d-flex bg-warning text-white text-center flex-row flex-column' >
         <span><i class='fa fa-thumbs-up fa-2x'></i></span>
         <span>Reliable Service</span>

     </div>


     <div class=' d-flex bg-warning text-white text-center flex-row flex-column'>
          <span><i class='fa fa-star fa-2x'></i></span>
          <span>Cost-Effective Solutions</span>

     </div>

     </div>

 </div>



 <div class='bg-dark service-container text-center '>


 
     <span class='text-white bg-secondary rounded rounded-pill px-2 py-1 mt-4 mb-3'  data-aos='fade-up'>Services</span>  <br>

     <br><br>

     <h4 class='text-white fw-bold text-center ' data-aos='fade-up'>Explore our comprehensive range<br> of Professional Services</h4><br>
     
     <div class='container services text-white'  data-aos='fade-up' data-aos-transition="ease-in-out">
         
         <div>
    
              <a href='service-providers.php?work=information technology'><img src="assets/icons/information-technology-white.png" alt="efix"></a>

              <span><a class='text-white fw-bold' href='service-providers.php?work=information technology'>information technology</a> </span>

         </div>


         <div>
            
             <img src="assets/icons/electrical-white.png" alt="efix">

             <span><a class='text-white fw-bold' href='service-providers.php?work=inverter services'>inverter services</a></span>
         
        </div>

        
        <div>
            
            <img src="assets/icons/ac.png" alt="efix">

            <span><a class='text-white  fw-bold' href='service-providers.php?work=Air conditioner'>Ac</a></span>
        
       </div>

          
       <div>
            
  
           <img src="assets/icons/mechanics-white.png" alt="efix">
            
            <span><a class='text-white text-sm fw-bold' href='service-providers.php?work=mechanic'>mechanic</a></span>
           
    

        </div>
        

        <div>
            
         <img src="assets/icons/make-up-white.png" alt="efix"> 

         <span><a class='text-white  fw-bold' href='service-providers.php?work=makeup artists'>Makeup Artists</a> </span>
         
        </div>
         


        <div>
          <img src="assets/icons/vulganizer-white.png" alt="efix">

          <span><a class='text-white fw-bold' href='service-providers.php?work=vulganizer'>vulganizer</a></span>

        </div>


        
        <div>
          <img src="assets/icons/car-wash.png" alt="efix">

          <span><a class='text-white  fw-bold' href='service-providers.php?work=car wash'>Car Wash</a></span>

        </div>


        
        <div>

          <img src="assets/icons/pet-service.png" alt="efix">

          <span><a class='text-white fw-bold' href='service-providers.php?work=pet service'>Pet Service</a></span>

        </div>


        
        <div>
          <img src="assets/icons/counselling-white.png" alt="efix">

          <span><a class='text-white  fw-bold' href='service-providers.php?work=counselling'>Counseling</a></span>

        </div>


        <div>
           
          <img src="assets/icons/cleaning-white.png" alt="efix">

          <span><a class='text-white fw-bold' href='service-providers.php?work=cleaning'>Cleaning</a></span>

        </div>


        
        <div>
           
          <img src="assets/icons/hairdressers-white.png" alt="efix">

          <span><a class='text-white  fw-bold' href='service-providers.php?work=hairdressers'>Hairdressers</a></span>

        </div>



        <div>
           
           <img src="assets/icons/wellness-white.png" alt="efix">

           <span><a class='text-white fw-bold' href='service-providers.php?work=wellness'>Wellness</a></span>

         </div>

     </div>
 
<br><br>

 </div>
 <br>

 <div class=' why-section container ' data-aos='zoom-in' data-aos-transition="ease-in-out">

      <div>
         
          <img src="assets/img/why.png" alt="efix">

     </div>



     <div>

         <small class='d-flex flex-row flex-column rounded rounded-pill text-danger px-2 fw-bold w-100'>WHY US</small><br>

         <h4 class='fw-bold'>The Efix advantage: Reasons to trust our expertise</h4>
        
         <span class='text-sm text-secondary'>Our open, positive and proactive approach helps us find ways to align our work environment with the culture</span><br>
         
         <div class='mt-3'>

             <span class='fw-bold rounded rounded-circle bg-dark text-white px-1'><i class='fa fa-check'></i></span>
             <span class='text-sm fw-bold'>Monthly inspection</span>

         </div>
    
         <div class='mt-1'>

              <span class='fw-bold rounded rounded-circle bg-dark text-white px-1'><i class='fa fa-check'></i></span>
              <span class='text-sm fw-bold'>General Repair maintenance</span>

         </div>

         <div class='mt-1'>

              <span class='fw-bold rounded rounded-circle bg-dark text-white px-1'><i class='fa fa-check'></i></span>
              <span class='text-sm fw-bold'>Fixing of faulty appliances</span>

         </div>



     </div>

 </div>




 <div class='bg-white py-5 container d-flex justify-content-between'  data-aos='fade-up' data-aos-transition="ease-in-out">

     <div>
         <p class='text-warning fw-bold text-sm'>Testimonials</p>
         <h4 class='fw-bold'>Hear what they have to always to say about<br> our professional services</h4>
     </div>

     <div class='d-flex  align-items-end'>
           <br><br>
         <div class='d-flex justify-content-evenly g-3'>
              <span class='bg-warning text-white shadow  p-2 previous-button'><a><i class='fa fa-chevron-left'></i></a></span>
              <span class='bg-warning text-white shadow p-2 next-button'><a><i class='fa fa-chevron-right'></i></a></span>
         </div>

     </div>
 </div>

 <br><br>

 <div class='container mt-4 comment-section'>

     <div class='py-5 px-2 comments-content d-flex align-items-center flex-row flex-column bg-white g-3'>

         <span class='fa fa-quote-right text-danger fa-3x'></span>

         <p class='text-sm fw-bold w-50 text-center'>Working with this handyman was a breeze, their expertise in handling tasks were impressive</p>
          
             <div class='d-flex align-items-center g-3'>
                 <img src="assets/img/woman.jpg" alt="">

                 <div class='d-flex flex-row flex-column'>
                     <span class='text-sm fw-bold'>Neeyo</span>
                     <span class='text-sm text-secondary'>Senior designer , Edirect.ng</span>
                 </div>

            </div>
     </div>


     <div class=' py-5 px-2  comments-content d-flex align-items-center flex-row flex-column bg-white g-3'>

<span class='fa fa-quote-right text-danger fa-3x'></span>

<p class='text-sm fw-bold w-50 text-center'>Working with this handyman was a breeze, their expertise in handling tasks were impressive</p>
 
     <div class='d-flex align-items-center g-3'>
          <img src="assets/img/guy.jpg" alt="">

         <div class='d-flex flex-row flex-column'>
            <span class='text-sm fw-bold'>AdeWale</span>
            <span class='text-sm text-secondary'>Senior developer , Ebnbhotel.ng</span>
         </div>

     </div>
</div>


<div class=' py-5 px-2 d-flex  comments-content align-items-center flex-row flex-column bg-white g-3'>

<span class='fa fa-quote-right text-danger fa-3x'></span>

<p class='text-sm fw-bold w-50 text-center'>Working with this handyman was a breeze, their expertise in handling tasks were impressive</p>
 
     <div class='d-flex align-items-center g-3'>
         <img src="assets/img/woman.jpg" alt="">

         <div class='d-flex flex-row flex-column'>
            <span class='text-sm fw-bold'>Peter</span>
            <span class='text-sm text-secondary'>Senior developer , Edirect.ng</span>
         </div>

     </div>
</div>

    


 </div>

 <br><br><br>

 <div class='appointments bg-warning text-white py-5 d-flex align-items-center flex-row flex-column'  data-aos='zoom-in'>
     
   <span class='bg-light rounded rounded-pill text-capitalize text-danger text-sm px-2 py-1'>appointment</span>

   <h2 class='fw-bold text-center'>Ready to get your home<br> in top shape</h2>

   <span class='text-center'>Schedule your service with us today and experience quality handyman solutions</span>
    
   <span><a href='service-providers.php' class='btn btn-light fw-bold text-warning rounded' href="">Book now <i class='fa fa-chevron-right'></i></a></span>

 </div>


 <div class='container mt-5'  data-aos='zoom-in-up'>
     
     <div class='fw-bold'>
          
         <span class='bg-white rounded rounded-pill px-2 py-1 text-warning fw-bold mb-4'>Contact us</span>
              <br>
         <h4 class='my-4 fw-bold'>Booking form</h4>

         <p class='text-secondary'>Fill out the form below to get a quote on your project</p>

         <div class='d-flex g-3 flex-md-row flex-column'>

               <div class='col-md-6'>

                      <div class='jumbotron'>
                       
                          <form id='formquote'>

                             <div class='d-flex g-5 flex-md-row flex-column'>
                                
                                 <div class='d-flex flex-row flex-column'>
                                     <label for="full name">Full name</label>
                                     <input type="text" name='fullname' placeholder="Full name" class='border-0'>
                                 </div>

                                 <div class='d-flex flex-row flex-column'>
                                     <label for="email">Email</label>
                                     <input type="email" name='email' placeholder="Enter email address" class='border-0 w-100'>
                                 </div>

                             </div>

                             <br>
 
                             <div class='d-flex g-5 flex-md-row flex-column'>
                                 <div  class='d-flex flex-row flex-column'>
                                     <label for="telephone">Telephone</label>
                                     <input type="number" name='telephone' placeholder="Enter phone number" class='border-0' min='0' min-length='11'>
                                 </div>

                                 <div  class='d-flex flex-row flex-column'>
                                     <label for="date">Date</label>
                                     <input type="date" name='date' placeholder='Select date' class='border-0 px-4' >
                                 </div>

                             </div>

                             <br>

                             <div>
                              

                                 <div class='d-flex flex-row flex-column g-3'>
                                     <label for="date">Address</label>
                                     <textarea placeholder='Input an address' name='address' rows='4' class='border-0 text-sm'></textarea>
                                 </div>

                             </div>

                             <br>

                             <button id='btn-quote' class='btn btn-quote btn-warning text-white text-sm'>Get a Quote  <i class='fa fa-chevron-right'></i></button>
                            

                           </form>


                     </div>

               </div>

               <div class='col-md-6'>

                   <div class='contact-container'>

                          <div class='contact-content py-1 px-2'>

                              <span><i class='fa fa-map-marker'></i></span>

                              <span>No 24 Iyalla Street Ikeja, Lagos state.</a></span>

                          </div>

                           <div class='contact-content px-2 py-1'>
                             
                           <span><i class='fa fa-phone'></i></span>

                           <span><a class='text-dark text-sm fw-bold' href="tel:+2348045432121">(+234) 08045434125</a></span>

                           </div>


                          <div class='contact-content px-2 py-1'>
                                 <div>
                                      <span><i class='fa fa-envelope'></i></span>
                                      <span><a class='text-dark text-sm fw-bold' href='mailto:info@efix.ng'>info@efix.ng</a></span>
                                 </div>
                          </div>


                   </div>





               </div>

         </div>



     </div>



 </div>

<?php } ?>

 
<!------------------------------------------btn-scroll--------------------------------------------------->

<a class=" btn-down" onclick="topFunction()">&#8593;</a>


<br><br>

<!-----------------------------------------Footer--------------------------------------------------->

<?php include 'components/footer.php'; ?>

<!-- beginning of java script section -->


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        offset: 200, // Trigger animations after scrolling 200px
       // Delay before starting animation
   // Duration of the animation
      easing: 'ease-in-out', // Easing function

    });
  </script>


<script>
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {

                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Set the latitude and longitude values to the input fields
                $("#mylatitude").val(latitude);
                $("#mylongitude").val(longitude);

                setTimeout(() => {
                    
                // Make the AJAX request to send data to the server
                $.ajax({
                    url: "engine/getLocation.php", // PHP file that will handle the location data
                    type: "POST",           // Use POST method to send data
                    data: {latitude: latitude, longitude: longitude}, // Send data
                    success: function(data) {
                      
                        if (data == 1) {
                            console.log("Success");
                            // Success response
                            // swal({
                            //     title: "Success",
                            //     icon: "success",
                            //     text: "Location received successfully",
                            // });
                        } else {
                            console.log(data);
                            swal({
                            //     title: "Error",
                            //     icon: "error",
                            //     text: "Unable to retrieve your location",
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err); // Log any error that occurs during the AJAX request
                    }
                });

            }, 3000);


            }, function(error) {
                // If there's an error (e.g., user denies location access)
                // $('#location').text('Unable to retrieve your location.');
            });
        } else {
            // If geolocation is not supported by the browser
            // $('#location').text('Geolocation is not supported by this browser.');
        }
    });
</script>

<script>
         var myaddress = "<?php echo $myaddress; ?>";

</script>

</body>
</html>



<script>

var flickity = new Flickity('.comment-section', {
  cellAlign: 'left',
  contain: true,
  autoPlay: true,
});


var prevButton = document.querySelector('.previous-button');
var nextButton = document.querySelector('.next-button');



if (prevButton && nextButton) {
       prevButton.addEventListener('click', function() {
        flickity.previous();
  });

  nextButton.addEventListener('click', function() {
       flickity.next(); 
  });
}
</script>





<script>

         $(".menu-icon").click(function(){

              $(this).toggleClass("close");

             $("#myform").toggleClass("overlayParent");

         });

</script>


<script>
    $("#btn-quote").click(function(e) {
        e.preventDefault();
        var formquote = $("#formquote").serialize();

        $.ajax({
            url: "engine/get-quote.php",
            type: "post",
            data: formquote,
            success: function(response) {
                if (response == 1) {
                    swal({
                        title: "Success",
                        text: "Quote will be sent shortly",
                        icon: "fa-envelope-o",
                    });
                } else {
                    swal({
                        title: "Notice",
                        text: response,
                        icon: "warning",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "An unexpected error occurred.",
                    icon: "error",
                });
            }
        });
    });
</script>


</body>
</html>