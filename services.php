<html lang="en">
<head>
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/services.css">
    <title>Services</title>
</head>
<body>
    <div>

    <?php include 'components/overlay-inner.php'; ?>
     <br><br>

     <?php include 'components/calltoaction.php'; ?>
  <br>   

<div class='container mt-5'>

<h6 class='fw-bold mb-4 fs-2'>Book A Service</h6>

<div>
     
      <div class='services'>
          
          <div>
              

               <img src="assets/icons/information-technology.png" alt="efix">

               <span><a style='font-size:13px !important;'>information technology</a> </span>

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




          
         <div>
            
            <img src="assets/icons/plumber.png" alt="efix">
 
            <span><a id="btn_service" class="btn_service">Plumbing</a></span>
 
          </div>




          
         <div>
            
            <img src="assets/icons/caterer.png" alt="efix">
 
            <span><a>Caterer</a></span>
 
          </div>



          
         <div>
            
            <img src="assets/icons/barber.png" alt="efix">
 
            <span><a>Barber</a></span>
 
          </div>




          
         <div>
            
            <img src="assets/icons/house-painter.png" alt="efix">
 
            <span><a>House Painter</a></span>
 
          </div>





         

      </div>



</div>

</div>
<!-- HTML Structure for the Popup -->
<div class="popup" id="popup">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">What service do you need?</h5>
        <button id="close-popup" class="btn-close" aria-label="Close"></button>
    </div>

    <div class="popup-content rounded shadow p-4">
        <div class="service-options p-3 mb-3 border border-primary rounded bg-light">
            <p class="fw-semibold mb-3">Plumber Services</p>
            <div class="form-check">
                <input type="checkbox" id="repair" class="form-check-input">
                <label for="repair" class="form-check-label">Plumbing Repair</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="drain" class="form-check-input">
                <label for="drain" class="form-check-label">Drain/Leaks Fixing</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="fixing" class="form-check-input">
                <label for="fixing" class="form-check-label">Plumber Fixing</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="toilet" class="form-check-input">
                <label for="toilet" class="form-check-label">Toilet Repairs</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="water-treatment" class="form-check-input">
                <label for="water-treatment" class="form-check-label">Water Treatment/Tank Washing</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="boreholes" class="form-check-input">
                <label for="boreholes" class="form-check-label">Boreholes</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="others" class="form-check-input">
                <label for="others" class="form-check-label">Others</label>
            </div>
        </div>
        <button class="btn btn-primary w-100">GO</button>
    </div>
</div>


      <!------------------------------------------btn-scroll--------------------------------------------------->

      <a class=" btn-down" onclick="topFunction()">&#8593;</a>

      
<br><br>
    <?php include 'components/footer.php'; ?>

    <script>

       $(document).ready(function() {
        $(".btn_service").click(function() {
         $('#popup').animate({
        bottom: '30%', // Move to middle
        opacity: 1     // Fade in as it moves up
    },500); // Animation duration in milliseconds
       });
    });

       $(".close-popup").click(function() {
         $('#popup').animate({
        bottom: '-100%', // Move back to top
        opacity: 0     // Fade out as it moves down
    }, 500); // Animation duration in milliseconds
       });
    </script>
</body>
</html>