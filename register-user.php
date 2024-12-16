
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Registration Page</title>
</head>
<body>
     <div>
         <div class='bg-login'>

         <div style='margin-top:-20px;cursor:pointer;' class='position-absolute px-4 d-flex flex-row flex-column'>

               <a href='index.php' class='text-white logo mt-5'><img src="assets/img/logo.png" alt="efix"></a>

               <a onclick='history.go(-1)' class='fw-bold text-white mt-4' ><i class='fa fa-chevron-left'></i></a>
         </div>


         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3a724" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
         <div class='container form-container d-flex flex-row flex-column g-5'>

            <h2 class='fw-bold'>Register</h2>


            <!-- form -->

            <form id='form-signup' class='d-flex flex-row flex-column'>

            <label for="name"  class='fw-bold'> Name</label>

            <input  type="text" name='user_name' class='sp_name' placeholder='Enter Name'>

            <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
            <input  type="email" name='user_email' placeholder='Enter email address'>

            <label for="password"  class='fw-bold'>PASSWORD</label>

            <input type="password" name='user_password'  placeholder='Enter password'>

            <label for="password"  class='fw-bold'>CONFIRM PASSWORD</label>

            <input type="password" name='confirm_password'  placeholder='Confirm password'>

           <label for="location" class='fw-bold'>LOCATION</label>
         
           <input type="text" min="1" minlength="12"  placeholder="Location"  name="user_location">

           <input type="hidden" value="0" name="verified">


            <div class="text-right">

                    <span><a class='text-secondary' href='login.php'>Already a member? <span class='text-decoration-underline'>Login</span></a></span>

            </div>

            <div>

                   <button id='btn-register' class='btn-signin btn btn-secondary'>Register</button>

                   <?php include 'components/loader.php'; ?>
                  
            </div>

            </div>

            </form>
            
         </div>

     </div>
<br><br>
     <?php include 'components/footer.php';?>
 </div>
 
 <script type="text/javascript">

//   $('#form-signup').on('submit',function(e){

//         e.preventDefault();

//         $("#loading-image").show();

//          $('.btn-signin').prop('disabled', true);
        
//         var formdata = new FormData();

//       $.ajax({

//             type: "POST",

//             url: "engine/signup-process.php",

//             data:new FormData(this),

//             cache:false,

//             processData:false,

//             contentType:"json",

//              success: function(response) {

//              $("#loading-image").hide();

// if (response==1) {

          
//               swal({
//                        text:"A verification link has been sent to the email provided",
//                       icon:"success",

//               });

//               $("#form-signup")[0].reset();

//                $('#btn-signin').prop('disabled', false);
               
// } 

// else{
//               swal({

//                 icon:"error",
//               	text:response

//               });

//               $('.btn-signin').prop('disabled', false);
            
//               $('input').css('border-color','red');

//            }

//             },

//             error: function(jqXHR, textStatus, errorThrown) {

//                 console.log(errorThrown);

//             }

//         })

//     });





</script>

<script>
$('#form-signup').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally
    
    $("#loading-image").show(); // Show loading image
    $('.btn-signin').prop('disabled', true); // Disable submit button during submission
   
    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: "engine/inter-signup-process.php",
        data: formData,
        processData: false, // Don't let jQuery try to process the data
        contentType: false, // Don't set content-type header because FormData sets it correctly
        success: function(response) {
            $("#loading-image").hide(); // Hide loading image
            
            if (response == 1) {
                swal({
                    text: "A verification link has been sent to the email provided",
                    icon: "success",
                });
                $("#form-signup")[0].reset(); // Reset the form
                $('.btn-signin').prop('disabled', false); // Re-enable submit button
            } else {
                swal({
                    icon: "error",
                    text: response
                });
                $('.btn-signin').prop('disabled', false); // Re-enable submit button
                $('input').css('border-color', 'red'); // Highlight invalid fields
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown); // Log any errors in the request
        }
    });
});
</script>


</body>
</html>