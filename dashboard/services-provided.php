<?php session_start();

require('../engine/config.php');

if(isset($_SESSION['sp_email'])){

     $sp_email = $_SESSION['sp_email'];
     $get_user = mysqli_query($conn, "SELECT * FROM service_providers WHERE sp_email = '". $sp_email."' and sp_verified = 1");
     if($get_user->num_rows>0){ 
         while($row = mysqli_fetch_array($get_user)){
              $user_id = $row["sp_id"];
              $user_name = $row["sp_name"];
              $user_email = $row["sp_email"];
              $user_img = $row["sp_img"];
              $user_phone = $row["sp_phonenumber1"];
              $user_phone1 = $row["sp_phonenumber2"];
              $user_location = $row["sp_location"];
              $user_experience = $row["sp_experience"];
              $user_bio = $row["sp_bio"];

          }

      }

    }


    
elseif(isset($_SESSION['email'])){

    $email = $_SESSION['email'];
    $get_user = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_email = '". $email."' and verified = 1");
    if($get_user->num_rows>0){ 
        while($row = mysqli_fetch_array($get_user)){
             $user_id = $row["id"];
             $user_name = $row["user_name"];
             $user_email = $row["user_email"];
             $user_img = $row["user_image"];
             $user_phone = $row["user_phone"];            
             $user_location = $row["user_location"];
        

         }

     }

   }


   else{
    header("location:../login.php");
    exit(); 
   }

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../dashboard/css/services-provided.css">
    <link rel="stylesheet" href="../dashboard/css/main-part.css">
    <title>Profile</title>
</head>
<body>
    <span class='ml-4 mt-1'> 
       
          <i id="fa-bars" class='fa fa-bars fa-1x '></i>
</span>
     <div class='side-bar'>
        

      <?php include 'components/sidenav.php'; ?>



         <!-- main part -->



         <div class='main-part'>

               
              <div class='header-content'>
               
                   <div>
                         <h4 class='fw-bold'>Services Provided</h4>
                    </div>

                   <div class='notification-content'>
                       
                       <span class='bg-light text-dark'><i class='fa fa-search'></i></span>
                       <span class='bg-light text-dark'><i class='fa fa-bell'></i></span>
                         <div class='bg-light rounded rounded-pill d-flex g-5 px-3 '>
                             <img src="<?php echo$user_img;?>" class='rounded rounded-circle' alt="">
                             
                                     <a class='d-flex align-items-center text-dark text-decoration-none'><i class='fa fa-caret-down'></i></a>                      
                         </div>

                   </div>

              </div>

              <div class="container">

    
<select id="daily">


     <option value="daily">Daily</option>

     <option value="weekly">Weekly</option>

     <option value="monthly">Monthly</option>

     <option value="yearly">Year</option>



</select>

<br>


<table>

     <thead>


            <tr>
      
               <td>Service Provided</td>

              <td>Date</td>
 
             <td>Receiver</td>

             <td>Location</td>

             <td>Call Out Charge</td>

             <td>Ratings</td>


  
  
         </tr>


     </thead>


     <tbody>
  
   
         <tr>
      
          <td>Lorem ipsum</td>

          <td>11/20/2023</td>
 
          <td>Mr Temii</td>

          <td>Alausa Ikeja</td>

          <td>#3,500</td>

           <td>4.5 <i class="fa fa-star"></i></td>

         </tr>

     </tbody>

</table>

     <div style="text-align: right;margin-right: 50px;">

     <a class="btn btn-info" href="">Next <i class="fa fa-arrow-right"></i></a> page <b style="padding: 3px 9px; margin:0px 20px;background-color: rgba(192,192,292,0.4);">1</b> 20

     </div>

  </div>

</div>

</body>
</html>
