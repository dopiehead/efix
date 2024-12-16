<?php 
require 'engine/config.php';
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
      
   <?php 
    
     $service_providers = mysqli_query($conn,"SELECT  *  FROM service_providers"); ?>
   


     <div class='bg-blue px-3 py-5'>
     
     <?php 

     while($row = mysqli_fetch_assoc($service_providers)){
         $status = $row['status'];
         $sp_id = $row['sp_id'];
         $sp_name = $row['sp_name'];
         $sp_img = $row['sp_img'];
         $sp_category = $row['sp_category'];
         $sp_speciality = $row['sp_speciality'];
         $sp_location = $row['sp_location'];
         $sp_bio = $row['sp_bio']; 

         ?>

             <div class='bg-white card border-0 w-100'>
            
                <div class='service_provider_card mb-4'>
                 
                    <span class='bg-success text-white px-2 rounded rounded-pill text-sm'><?php if($status == 0){echo "offline";} else{echo "Available";}?></span>
                    <span>23km</span>

                </div>

                <div class='text-center'>

                <img src="<?php echo"efix/" .$sp_img ?>" class=" rounded rounded-circle" alt="">

                    <h5 class='text-dark fw-bold mt-3'><?php echo $sp_name ?></h5>
                    <p class='text-secondary text-capitalize'><?php echo htmlspecialchars($sp_speciality) ?></p>
                    <p class='text-primary text-capitalize'><?php echo htmlspecialchars($sp_location); ?></p>
                    <p class='text-secondary text-sm'><?php echo htmlspecialchars($sp_bio); ?></p>

                    <hr>

                    <a href='service-provider-details.php?id=<?php echo htmlspecialchars($sp_id); ?>' class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
                </div>
           

             </div>

     <?php  

        }

      ?>  

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