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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../dashboard/css/dashboard.css">
    <link rel="stylesheet" href="../dashboard/css/main-part.css">
    <title>Dashboard</title>
</head>
<body>
    <span class='ml-2 mt-1'> 
       
          <i id="fa-bars" class='fa fa-bars fa-1x '></i>
</span>
     <div class='side-bar'>
        
      <?php include 'components/sidenav.php'; ?>

         <!-- main part -->

         <div class='main-part'>
               
              <div class='header-content'>
               
                   <div>
                         <h4 class='fw-bold'>Overview</h4>
                    </div>

                   <div class='notification-content'>
                       
                       <span class='bg-light text-dark'><i class='fa fa-search'></i></span>
                       <span class='bg-light text-dark'><i class='fa fa-bell'></i></span>
                         <div class='bg-light rounded rounded-pill d-flex g-5 px-3 '>
                              
                             

                             <img src="<?php echo$user_img ?>" class='rounded rounded-circle' alt="">


                             
                                     <a class='d-flex align-items-center text-dark text-decoration-none'><i class='fa fa-caret-down'></i></a>                      
                         </div>

                   </div>


              </div>

              <!-- end of header content -->


              <div class='Portfolio-details w-100 full-width'>
                 
                 <div class='bg-total details-container-a px-2 py-2'>
                                 
                     <div>

                         <h6 class='fw-bold fs-4'><i class='fa fa-naira-sign'></i>20000</h6>

                         <span class='text-capitalize mt-2 text-secondary'>portfolio balance</span>
                           
                              <div class='chart-container'>
                                   
                                   <?php
                                        // Example data (replace with your actual data retrieval logic)
                                      $data = [
                                        
                                            "labels" => ["January", "February", "March", "April", "May","June", "July", "August","September", "October", "November", "December"],
                                            "values" => [12, 19, 3, 5, 2, 20, 6, 7, 11, 12, 19, 3]
                                        ];
                                         ?>

                                        <canvas id="barChart"  style="width:500px;"></canvas>

                              </div>             
                       
                     </div>

                 </div>

                 <div class='d-flex justify-content-space-between align-items-center  details-container-b  p-1'>

                        <div class='bg-total bg-gradient py-5 px-2'>

                             <h6 class='fw-bold text-primary'>Total Request</h6>

                             <span class='fw-bold fs-4'>0</span>

                             <div class='mt-3'><span id='bg-success-star' class='bg-danger-star'></span><i class='fa fa-star'></i> <span class='text-danger text-sm'>-12.76%</span> <span class='text-primary text-sm'>Last month</span></div>
                            

                        </div>

                        <div class='bg-total bg-gradient px-2 py-5'>

                             <h6 class='fw-bold text-primary'>Total Work done</h6>

                             <span class='fw-bold fs-4'>0</span>

                             <div class='mt-3'><span id='bg-success-star' class='bg-success-star'></span><i style='background-color:green;' class='fa fa-star'></i> <span class='text-primary text-sm'>+343%</span> <span class='text-primary text-sm'>Last month</span></div>
                            
                         </div>


                         
                        <div class='bg-total bg-gradient px-2 py-5'>

                             <h6 class='fw-bold text-primary'>Total Customers</h6>

                             <span class='fw-bold fs-4'>0</span>

                             <div class='mt-3'><span id='bg-danger-star' class='bg-danger-star text-white'></span><i class='fa fa-star'></i> <span class='text-danger text-sm'>-12.76%</span> <span class='text-primary text-sm'>Last month</span></div>
                            

                         </div>


                 </div>


              </div>

              <div>

                   <div class='d-flex market-percentage'>

                         <h6 class='fw-bold fs-4'>Market is down 7%</h6>

                          <select name="" class='border-0 text-capitalize bg-light px-2 py-1 text-sm' id="">

                               <option value="">Select Month</option>
                               <option value="">January</option>
                               <option value="">February</option>
                               <option value="">march</option>
                               <option value="">april</option>
                               <option value="">may</option>
                               <option value="">june</option>
                               <option value="">july</option>
                               <option value="">august</option>
                               <option value="">september</option>
                               <option value="">october</option>
                               <option value="">november</option>
                               <option value="">december</option>


                         </select>


                   </div>

                <div class='d-flex flex-column flex-md-row   justify-content-space-between px-2 g-5'>


                 <div class='px-2 overflow-auto table-container'>
                    
                   <table class='table-hovered table-responsive table-striped text-center text-capitalize bg-light'>

                         <tr>

                              <thead>

                                   <tr>
                                      <th>Customer Name</th>
                                      <th>Price</th>
                                      <th>Customer Image</th>
                                    
                                      <th>Progress</th>
                                      <th>date</th>
                                   </tr>


                              </thead>

                              <tbody>
                                     
                                      <tr>

                                         <td>Musa Daniel</td>

                                         <td><i class='fa fa-naira-sign'></i>5000</td>

                                         <td class='customer_image'><img class='rounded rounded-circle' src='../assets/img/woman.jpg' alt='e-fix'></td>

                          

                                         <td><span class='text-success'>done</span></td>

                                         <td>2:30pm Jan 20 2025</td>



                                     </tr>


                                                                          
                                     <tr>

                                           <td>Peter Jonah</td>

                                           <td><i class='fa fa-naira-sign'></i>8000</td>

                                           <td class='customer_image'><img class='rounded rounded-circle' src='../assets/img/guy.jpg' alt='e-fix'></td>

                                        

                                           <td><span class='text-warning'>pending</span></td>

                                           <td>2:30pm Jan 20 2025</td>



</tr>






                              </tbody>

                         </tr>




                    </table>

              </div>



              <div class='reached-audience bg-light  px-2 py-3 '>

                   <h6 class='fw-bold'>Reached Audience</h6>

                   <div class='rounded d-flex justify-content-space-between '>


                            <div class='d-flex flex-md-row flex-column '>

                            <span><i style='color:skyblue;' class='fa fa-circle'></i><strong>30% Target reached</strong></span> 

                               <span><i class='fa fa-circle'></i><strong>70% Target reached</strong></span> 

                              


                             </div> 
                      
                             <div>

                             <div class="progress-circle">

                                  <span class="progress-text">30% Interaction</span>



                             </div>  



                         </div>

                   </div>

                  
                    


              </div>

         


</div>

<br><br>





         </div>

                                    </div>


     <script>
        // Prepare data from PHP
        const labels = <?php echo json_encode($data['labels']); ?>;
        const values = <?php echo json_encode($data['values']); ?>;

        // Render the bar chart
        const ctx = document.getElementById('barChart').getContext('2d');
        const myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Data',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

 
     
</body>
</html>
