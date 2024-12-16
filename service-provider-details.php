<?php session_start();
 require 'engine/config.php'; 

if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
header("location:search-process.php?search=" .htmlspecialchars($query)); 
 }  
}  

 ?> 

<?php
if (isset($_GET['id'])) {
$id = mysqli_escape_string($conn,$_GET['id']);
$service_provider = mysqli_query($conn,"SELECT * from service_providers where sp_id ='$id'");
$sql =  mysqli_query($conn,"UPDATE service_providers SET views = views +1 where sp_id ='$id'");
while ($row = mysqli_fetch_array($service_provider)) {
$sp_id =  $row['sp_id'];
$sp_img = $row['sp_img'];
$sp_speciality = $row['sp_speciality'];
$sp_category = $row['sp_category'];
$sp_name = $row['sp_name']; 
$sp_location = $row['sp_location'];
$sp_experience = $row['sp_experience']; 
$sp_bio = $row['sp_bio']; 
$sp_ratings = $row['ratings']; 
$sp_verified = $row['sp_verified'];
$sp_email = $row['sp_email'];
$sp_phone1 = $row['sp_phonenumber1'];
$sp_phone2 = $row['sp_phonenumber2'];
$sp_price = $row['pricing'];
$bank_name = $row['bank_name'];
$pay = $row['pay'];
$account_number = $row['account_number'];
		
	}
	
}
?>


<?php 

if (isset($_SESSION["id"])) {
$date = $_SESSION['date'];
$userId = $_SESSION['id'];
$username =$_SESSION['name'];
$useremail =$_SESSION['email'];
}


if (isset($_SESSION["sp_id"])) {
$date = $_SESSION['sp_date'];
$userId = $_SESSION['sp_id'];
$username = $_SESSION['sp_name'];
$useremail = $_SESSION['sp_email'];

}




?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/details.css">

    <title>Service Provider | Details</title>
    
</head>
<body>
<?php include 'components/overlay-inner.php'; ?>
  
     <div class='px-3 mt-4'>

         <div class='row'>
           
              <div class='col-md-7'>

                     <img class='img-service' src="<?php echo"efix/".$sp_img;?>" alt='e_fix'>

              </div>

              <div class='col-md-5'>

                     <div class='d-flex justify-content-start flew-row flex-column g-5'>


                       <h2 class='fw-bold'><?php echo $sp_name; ?></h2>

                       <h6 class='fs-4'><?php echo $sp_category; ?></h6>

                       <span class='text-sm'><i class='fa fa-map-marker fa-1x'></i> <?php echo $sp_location; ?></span>

                       <span class='text-sm'> <i class='fa fa-envelope fa-1x'></i> <?php echo $sp_email; ?></span>

                       <span class='text-sm'><i class='fa fa-phone'></i> <?php echo $sp_phone1 ?>, <?php echo $sp_phone2; ?></span>

                       <p><span class='bg-white border border-2 px-2 py-1 mr-1 fw-bold'>Experience</span> : <span>Over <?php echo $sp_experience; ?> years</span> </p>


                       <h6 class='fw-bold mt-2'>Bio</h6>
                       
                       <p class='text-sm'><?php echo $sp_bio; ?></p>
                      
                    </div>
                    <div>

                         <span id='<?php echo $sp_id; ?>'><i class='fa fa-share-alt'></i> Share</span>

                         <div class='connect mt-2'>

                            <span id='<?php echo $sp_id ?>' class='bg-primary text-white px-3 py-2 rounded border-0 form-control'>Book</span>

                            <span class='text-info bg-white border-2 border border-info rounded px-3 py-2 form-control'>Send a message</span>

                         </div>

                    </div>
             </div>


         </div>


      <!-- End of class row -->


      <div class="more">

         <img src="assets/img/img1.jpg" alt="">

        <div class='img_slide'>
              <img src="assets/img/img2.jpg" alt="">
              <img src="assets/img/img6.jpg" alt="">
         </div>


         <img src="assets/img/img3.jpeg" alt="">
         <img src="assets/img/img4.jpg" alt="">





      </div>


      <div class='px-2 mt-5'>

        <h5 class='fw-bold'>Our Services</h5>
        
        <hr>

        <ul class="list-unstyled li-prop text-sm">  

            <li><i class='fa fa-check'></i> Extended Warranties</li>
            <li><i class='fa fa-check'></i> Home delivery</li>
            <li><i class='fa fa-check'></i> Car Buying</li>
            <li><i class='fa fa-check'></i> Car Sourcing</li>
            <li><i class='fa fa-check'></i> Live Video Viewing</li>
            <li><i class='fa fa-check'></i> Extended warranties</li>
            <li><i class='fa fa-check'></i> Click and Collect</li>
            
        </ul>


      </div>

      <div class="mt-5 px-2">
        
         <div class='shadow-md pl-2 w-100 py-2 px-2'>
              <h6 class='fw-bold'>Work</h6>
              <span><i class='fa fa-chevron-down'></i></span>

         </div>
  


      </div>

      
     <!-- working hours -->

     



      <div class="d-flex working-container px-3 mt-5">
          
           <div class='working_hrs'>
            
            <div>
            <span>Monday</span>
            <span>10:00 - 15:00</span>
            </div>

            <div>
            <span>Tuesaday</span>
            <span>10:00 - 15:00</span>
            </div>

            <div>
            <span>Wednesday</span>
            <span>10:00 - 15:00</span>
            </div>

            <div>
            <span>Thursday</span>
            <span>10:00 - 15:00</span>
            </div>

            <div>
            <span>Friday</span>
            <span>10:00 - 15:00</span>
            </div>

            <div>
            <span>Saturday</span>
            <span>10:00 - 15:00</span>
            </div>



           </div>

           <div>
            
                <img src="assets/img/images.jpg" alt="">


           </div>




      </div>

         <div>

         <div class='fw-bold mt-5 mb-4 px-3 '>

                  <h5 class='fw-bold'>Reviews</h5>
                  <hr>
         </div>

         <div class='mt-4 px-3 reviews-container py-2 mb-4'>

             <div class='review-content'>

             <div>
               
                   <span class='fw-bold'><span class='rounded rounded-circle px-2 bg-secondary text-white mr-2'>B</span>Blessing Linus</span>

                  <p>Lorem ipsum dolor sit amet consectetur. Tellus scelerisque donec elementum donec leo integer adipiscing nunc. Commodo consectetu</p>

             </div>       

              </div>


              <div class='review-content'>




<div>
  
      <span class='fw-bold'><span class='rounded rounded-circle px-2 bg-secondary text-white mr-2'>B</span>Blessing Linus</span>

     <p>Lorem ipsum dolor sit amet consectetur. Tellus scelerisque donec elementum donec leo integer adipiscing nunc. Commodo consectetu</p>

</div>





 </div>

   </div>

   <br>

   
  <a class='text-info bg-white mt-4 px-3 py-2 fw-bold border border-2 border-info rounded'>Post Comment</a>
       
   
          <br><br>



      <?php include 'components/banner.php';     ?>

      <br><br>


      <div class='px-3'>

         <h5 class='fw-bold'>Other Service Providers Near You</h5>
         <hr>


           <div class='other_sp'>

               <div class="sp_package">

                  <img src="assets/img/Rectangle1.png" alt="">

                  <h6 class='fw-bold'>Panel Beater</h6>

                  <div class='d-flex flex-column flex-row'>

                       <span><b>100%</b> <span class='text-sm'>verified</span></span>
               
                         <span class='verified'><i class='fa fa-check'></i><span class='check'><span style='visibility:hidden;'>1</span></span></span>
                  </div>

               </div>


               <div class="sp_package">

                   <img src="assets/img/Rectangle2.png" alt="">

                   <h6 class='fw-bold'>Electrician</h6>

                  <div class='d-flex flex-column flex-row'>

                       <span><b>100%</b> <span class='text-sm'>verified</span></span>
               
                         <span class='verified'><i class='fa fa-check'></i><span class='check'><span style='visibility:hidden;'>1</span></span></span>
                  </div>
               </div>



               <div class="sp_package">

                   <img src="assets/img/Rectangle3.png" alt="">

                   <h6 class='fw-bold'>Vulcanizer</h6>

                  <div class='d-flex flex-column flex-row'>

                       <span><b>100%</b> <span class='text-sm'>verified</span></span>
               
                         <span class='verified'><i class='fa fa-check'></i><span class='check'><span style='visibility:hidden;'>1</span></span></span>
                  </div>
              </div>



              <div class="sp_package">

                    <img src="assets/img/Rectangle4.png" alt="">

                    <h6 class='fw-bold'>Plumber</h6>

                  <div class='d-flex flex-column flex-row'>

                       <span><b>100%</b> <span class='text-sm'>verified</span></span>
               
                         <span class='verified'><i class='fa fa-check'></i><span class='check'><span style='visibility:hidden;'>1</span></span></span>
                  </div>
              </div>


              <div class="sp_package">

                       <img src="assets/img/Rectangle2.png" alt="">

                     <h6 class='fw-bold'>Mechanic</h6>

                  <div class='d-flex flex-column flex-row'>

                       <span><b>100%</b> <span class='text-sm'>verified</span></span>
               
                         <span class='verified'><i class='fa fa-check'></i><span class='check'><span style='visibility:hidden;'>1</span></span></span>
                  </div>
              </div>




           </div>




      </div>

          
     </div>

     </div>

      <!------------------------------------------btn-scroll--------------------------------------------------->

       <a class=" btn-down" onclick="topFunction()">&#8593;</a>

     <br><br>

     <?php include 'components/footer.php'; ?>

     <script>

          $('.other_sp'). flickity({
 
             cellAlign: 'left',
             contain: true,
             autoPlay: true,       
             prevNextButtons: true,
             pageDots: false,
        
            
            });



     </script>




<script>

$('.reviews-container'). flickity({

   cellAlign: 'left',
   contain: true,
   autoPlay: true,       
   prevNextButtons: true,
   pageDots:true,

  
  });



</script>

<script type="text/javascript">
	
function collapse() {
	// body...
$('#demo').toggleClass('active-button');

}


</script>


<script type="text/javascript">
$('.btn-pay').on('click',function(e){
  if (confirm("Do you want to pay to this service provider?")) {
  var pay = $('.btn-pay').attr('id');
 
  $.ajax({
  type: "POST",
  url: "provider-pay.php",
  data: 'id='+pay,
  success: function(data) {

  if (data==1) {
  window.location="pay-sp.php"; 
 }
              
else{
swal({icon:"error",text:data});

}
           

           

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })
}
    });


</script>




<script type="text/javascript">
$('#submit-sp').on('click',function(e){
    $("#loading-image").show();
    
        e.preventDefault();
        
  $.ajax({
           type: "POST",
            url: "report-page.php",
           data:  $("#report-form").serialize(),
            cache:false,
            contentType: "application/x-www-form-urlencoded",
            success: function(response) {
                
                $("#loading-image").hide();
            if(response==1){

swal({
text:"Your message has been recieved. Thank you!",
icon:"success",
});

 $("#popupAbuse").hide(1000);
    $("#report-form")[0].reset();
             }

       else { 
       
             swal({

text:"Issue field is required",
icon:"error",

});
         
            
}  
            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });
</script>


<script type="text/javascript">
    
    function toggle_abuse() {

var popup = document.getElementById('popupAbuse');
popup.classList.toggle('active');
  }

</script>

<script type="text/javascript">
$('#submit-message').on('click',function(e){
        e.preventDefault();
        $(".loader").show();
          $.ajax({
           type: "POST",
           url: "engine/message-process.php",
           data:  $("#form-message").serialize(),
           cache:false,
           contentType: "application/x-www-form-urlencoded",
           success: function(response) {
           $(".loader").hide();
           if (response==1) {
            swal({
            text:"Message sent",
             icon:"success",
            });
                
            $("#popup").hide(1000);
            $("#form-message")[0].reset(); 
         
                                                        }    
            else{
            
              swal({ icon:"error",
              	     text:response
              });
           

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });
</script>

<script>

   function payForm() {

var popup = document.getElementById('popPay');
popup.classList.toggle('active');
}

</script>

</body>
</html>