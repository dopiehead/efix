<?php 

if(isset($_GET['work']) && !empty($_GET['work'])){
    $work = $_GET['work'];
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php' ?>
    <link rel="stylesheet" href="assets/css/service-providers.css">
    <title>Distance</title>

</head>
<body>
<?php include 'components/overlay-inner.php'; ?>
    
 <div class="container">

 <h6 class="mt-4 fw-bold"><?php if(!empty($work)) {echo $work;} ?> services around you</h6>

  <br><br>

  <?php include 'components/banner.php'; ?>

  <br><br>

 
     <div class='bg-blue px-3 py-5'>

             <div class='bg-white card border-0'>
            
                <div class='service_provider_card mb-4'>
                 
                    <span class='bg-success text-white px-2 rounded rounded-pill text-sm'>Available</span>
                    <span>23km</span>

                </div>

                <div class='text-center'>

                <img src="assets/img/wade.jpg" class=" rounded rounded-circle" alt="">

                    <h5 class='text-dark fw-bold mt-3'>Wade Wilson</h5>
                    <p class='text-secondary text-capitalize'>Plumber</p>
                    <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                    <p class='text-secondary text-sm'>Wade is a 32 year old plumber with an impressive experience behind him</p>

                    <hr>

                    <a class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
                </div>
           

             </div>


     


         <div>




         <div class='bg-white card border-0'>
            
            <div class='service_provider_card mb-4'>
             
                <span class='bg-primary text-white px-2 rounded rounded-pill text-sm'>Busy</span>
                <span>35km</span>

            </div>

            <div class='text-center'>

            <img src="assets/img/54.jpg" class=" rounded rounded-circle" alt="">

                <h5 class='text-dark fw-bold mt-3'>Seun Ademusa</h5>
                <p class='text-secondary text-capitalize'>Plumber</p>
                <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                <p class='text-secondary text-sm'>Wade is a 26 year old plumber with an impressive experience behind him</p>

                <hr>

                <a class='text-dark fw-bold mt-4'>VIEW PROFILE</a>

            </div>


         </div>


         </div>





           <div>

           <div class='bg-white card border-0'>
            
            <div class='service_provider_card mb-4'>
             
                <span class='bg-success text-white px-2 rounded rounded-pill text-sm'>Available</span>
                <span>41km</span>

            </div>

            <div class='text-center'>

            <img src="assets/img/plummer.jpg" class=" rounded rounded-circle" alt="">

                <h5 class='text-dark fw-bold mt-3'>Kayode Stone</h5>
                <p class='text-secondary text-capitalize'>Plumber</p>
                <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                <p class='text-secondary text-sm'>Wade is a 32 year old plumber with an impressive experience behind him</p>

                <hr>

                <a class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
            </div>
       

         </div>

           </div>

           <div>

           <div class='bg-white card border-0'>
            
            <div class='service_provider_card mb-4'>
             
                <span class='bg-success text-white px-2 rounded rounded-pill text-sm'>Available</span>
                <span>52km</span>

            </div>

            <div class='text-center'>

            <img src="assets/img/guy.jpg" class=" rounded rounded-circle" alt="">

                <h5 class='text-dark fw-bold mt-3'>Toba Habeeb</h5>
                <p class='text-secondary text-capitalize'>Plumber</p>
                <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                <p class='text-secondary text-sm'>Wade is a 32 year old plumber with an impressive experience behind him</p>

                <hr>

                <a class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
            </div>
       

         </div>

           </div>

           <div>

           <div class='bg-white card border-0'>
            
            <div class='service_provider_card mb-4'>
             
                <span class='bg-success text-white px-2 rounded rounded-pill text-sm'>Available</span>
                <span>56km</span>

            </div>

            <div class='text-center'>

            <img src="assets/img/woman.jpg" class=" rounded rounded-circle" alt="">

                <h5 class='text-dark fw-bold mt-3'>Kathy Joan</h5>
                <p class='text-secondary text-capitalize'>Plumber</p>
                <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                <p class='text-secondary text-sm'>Wade is a 32 year old plumber with an impressive experience behind him</p>

                <hr>

                <a class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
            </div>
       

         </div>

                 



           </div>






           


           <div>

           <div class='bg-white card border-0'>
            
            <div class='service_provider_card mb-4'>
             
                <span class='bg-danger text-white px-2 rounded rounded-pill text-sm'>Not Available</span>
                <span>60km</span>

            </div>

            <div class='text-center'>

            <img src="assets/img/john.jpg" class=" rounded rounded-circle" alt="">

                <h5 class='text-dark fw-bold mt-3'>Ameen Oluwole</h5>
                <p class='text-secondary text-capitalize'>Plumber</p>
                <p class='text-primary text-capitalize'>123 Main St, City, State 12345</p>
                <p class='text-secondary text-sm'>Wade is a 32 year old plumber with an impressive experience behind him</p>

                <hr>

                <a href='service-provider-details.php' class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
            </div>
       

         </div>

                 



           </div>


     </div>
               
     <div class="text-center text-dark pagination">
               
               <?php
                    for ($i = 1; $i <= 10; $i++) {
                         echo "<a id='".$i."' class='btn btn-pagination'>".$i ."<a>";
                   }
               ?>
      
      
               </div>


 </div>
             <!------------------------------------------btn-scroll--------------------------------------------------->

             <a class=" btn-down" onclick="topFunction()">&#8593;</a>

    <br><br>

    <?php include 'components/footer.php'; ?>
</body>
</html>