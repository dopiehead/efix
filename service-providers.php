<?php  

session_start();

require 'engine/config.php';

if (isset($_GET['work']) && !empty($_GET['work'])) {

    $work = $_GET['work'];
}

if (isset($_POST["submit"])) {  

    if (!empty($_POST["search"])) {  
     
        $query = str_replace(" ", "+", mysqli_real_escape_string($conn, $_POST["search"]));

        ?>
        
        <script>
       
            window.location.href = 'search-process.php?search=' + '<?php echo $query; ?>';

        </script>
        
        <?php 
    }  
}  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php' ?>
    <link rel="stylesheet" href="assets/css/service-providers.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Distance</title>

</head>
<body>
<?php include 'components/overlay-inner.php'; ?>
    
 <div class="container">

 <h6 class="mt-4 fw-bold "><span class='text-capitalize'><?php if(!empty($work)) {echo $work;} ?></span> Services around you</h6>

  <br><br>

  <div data-aos='fade-up' data-aos-transition='ease-in-out'>

       <?php include 'components/banner.php'; ?>
  </div>

  <br><br>
      
   <?php 

      $num_per_page = 20;

      $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

      $initial_page = ($page - 1) * $num_per_page;

      $condition =" SELECT * FROM  service_providers WHERE sp_verified = 1";

      $total_sql = mysqli_query($conn,"SELECT COUNT(*) AS total FROM service_providers");

      $total_records = $total_sql->num_rows;

      $total_num_page = ceil($total_records / $num_per_page);

     if(isset($work) || !empty($work)){
       
         $condition .= " AND sp_category like '%".$work."%' OR sp_speciality like '%".$work."%'";
     }


     if(isset($_SESSION['address']) && !empty($_SESSION['address'])){

        $myaddress = $_SESSION['address'];
  
        $getadress = explode(" ", $_SESSION['address']);

        foreach ($getadress as $address) {
  
       $condition .= " AND sp_location like '%".$address."%' OR sp_location like '%".$address."%'";

   }

}

  

     $condition .= " LIMIT $initial_page, $num_per_page";

     $service_providers = mysqli_query($conn,$condition);

     if( $service_providers->num_rows<1){

           echo "No service provider found";
     }
     
     ?>
   


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

             <div class='bg-white card border-0 w-100' data-aos='fade-up' data-aos-transition='ease-in-out'>
            
                <div class='service_provider_card mb-4'>
                 
                     <span class='bg-success text-white px-2 rounded rounded-pill text-sm'><?php if($status == 0){echo "offline";} else{echo "Available";}?></span>
                     <span>23km</span>

                </div>

                <div class='text-center'>

                <img src="<?php echo"efix/" .$sp_img ?>" class=" rounded rounded-circle" alt="">

                     <h5 class='text-dark fw-bold mt-3 text-capitalize'><?php echo $sp_name ?></h5>
                     <p class='text-secondary text-capitalize'><?php echo htmlspecialchars($sp_speciality) ?></p>

                    <hr>

                     <a href='service-provider-details.php?id=<?php echo htmlspecialchars($sp_id); ?>' class='text-dark fw-bold mt-4'>VIEW PROFILE</a>
                </div>
           

             </div>

     <?php  

        }

      ?>  

      </div>

</div>

               
     <div class="container text-center text-dark pagination">
               
     <?php
           $radius = 3; // Number of pages to display around the current page
           echo "<br>";
           if ($page > 1) {
               $previous = $page - 1;
               echo '<span id="page_num"><a href="service-providers.php?page='.$previous.'"  class="btn-success prev" id="' . $previous . '">&lt;</a></span>';
             }
           for ($i = 1; $i <= $total_num_page; $i++) {
                  if (($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
                      if ($i == $page) {
                             echo '<span id="page_num"><a href="service-providers.php?page='.$i.'" class="btn-success active-button" id="' . $i . '">' . $i . '</a></span>';
                        } else {
                              echo '<span id="page_num"><a href="service-providers.php?page='.$i.'" class="btn-success" id="' . $i . '">' . $i . '</a></span>';
        }
    } elseif ($i == $page - $radius || $i == $page + $radius) {
        echo "... ";
    }
}
if ($page < $total_num_page) {
    $next = $page + 1;
    echo '<span id="page_num"><a href="service-providers.php?page='.$next.'" class="btn-success next" id="' . $next . '">&gt;</a></span>';
}
?>

      
      
               </div>


 </div>
             <!------------------------------------------btn-scroll--------------------------------------------------->

             <a class=" btn-down" onclick="topFunction()">&#8593;</a>

    <br><br>

    <?php include 'components/footer.php'; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        offset: 200, // Trigger animations after scrolling 200px
       // Delay before starting animation
   // Duration of the animation
      easing: 'ease-in-out', // Easing function

    });
  </script>
</body>
</html>