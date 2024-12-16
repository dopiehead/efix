
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
    <link rel="stylesheet" href="../dashboard/css/work-experience.css">
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
                         <h4 class='fw-bold'>Work Experience</h4>
                    </div>

                   <div class='notification-content'>
                       
                       <span class='bg-light text-dark'><i class='fa fa-search'></i></span>
                       <span class='bg-light text-dark'><i class='fa fa-bell'></i></span>
                         <div class='bg-light rounded rounded-pill d-flex g-5 px-3 '>
                             <img src="<?php echo $user_img; ?>" class='rounded rounded-circle' alt="">
                             
                                     <a class='d-flex align-items-center text-dark text-decoration-none'><i class='fa fa-caret-down'></i></a>                      
                         </div>

                   </div>


              </div>

        
<div class="container">


<h6>Add work history</h6> 

<form id="formExperience"> 

<input type="hidden" name="spId" value="<?php echo $_SESSION['sp_id'] ?>">  

<input type="text" name="title" placeholder="Title" class="form-control">


<br>

<h6>Experience</h6> 

<textarea class="form-control" name="experience" placeholder=".....Write experience" minlength="40"  rows="5"  wrap="physical"  style="outline: none;"></textarea><br>

<br>

<small>From</small>

<input type="date" name="from_date" class="form-control">

<br>

<small>To</small>

<input type="date" name="to_date"  class="form-control">


<br>
<h6>Add images <i class="fa fa-camera"></i></h6> 

<p><span><b>Note:</b></span> Not more than 3 images</p>

<input type="file" name="fileupload[]" multiple="">

<br><br>

<h6>Amount charged</h6> 

<select name="currency"><option value="$">$</option><option value=" &#9839;"> NRN</option></select><br><br>

<input type="number" min="1" minlength="4" name="charge" class="form-control" placeholder="charge in NRN OR $">

</div>

<br><br>
<div class="mx-3 mb-2">

<button type="submit" name="submit" id="submit" class="btn btn-success" style="float: right;font-size: 13px;">Save  &#10095;</button>

<div class="text-center" style="display: none;" id="loading-image"><img id="loader" src="loading-image.GIF"></div>

</div>

</form>
</div>

</div>


<script>
    $('#formExperience').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        $("#loading-image").show(); // Show the loading image

        $.ajax({
            type: "POST",
            url: "https://estores.ng/api/postExperience.php", // Update to your API URL
            data: new FormData(this), // Use the form data
            cache: false,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            success: function(response) {
                $("#loading-image").hide(); // Hide the loading image

                try {
                    var data = JSON.parse(response); // Parse JSON response

                    if (data.status === "success") {
                        swal({
                            text: data.message || "Experience saved successfully", // Use the message from API response
                            icon: "success"
                        });
                        $('#bom').load(location.href + " #cy"); // Reload part of the page
                        $("#formExperience")[0].reset(); // Reset the form
                    } else {
                        swal({
                            icon: "error",
                            text: data.error || "An error occurred" // Use the error message from API response
                        });
                    }
                } catch (e) {
                    // Handle parsing errors (in case the response is not JSON formatted)
                    console.error("Parsing error:", e);
                    swal({
                        icon: "error",
                        text: "An unexpected error occurred. Please try again."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loading-image").hide(); // Hide the loading image
                console.log("AJAX error:", errorThrown);
                swal({
                    icon: "error",
                    text: "A network error occurred. Please check your connection and try again."
                });
            }
        });
    });
</script>


</body>
</html>
