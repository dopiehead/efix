<?php
if(isset($_GET['details']) && !empty($_GET['details'])){
$details = $_GET['details'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login Page</title>
</head>
<body>
     <div>
         <div class='bg-login'>
         
              <div style='margin-top:-20px;cursor:pointer;' class='position-absolute px-4 d-flex flex-row flex-column'>

                   <a href='index.php' class='text-white logo mt-5'>LOGO</a>

                   <a onclick='history.go(-1)' class='fw-bold back-button' ><i class='fa fa-chevron-left'></i></a>
              </div>

         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1a3547" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
        
            </div>

            <form id="login-form">

                  <div class='container form-container d-flex flex-row flex-column g-5'>      

                      <h2 class='fw-bold'>Login</h2>

                    <label class='fw-bold text-uppercase'>Select user type</label>

                    <select name='user_type' class=' form-control bg-light border-bottom border-2'>
                        
                         <option value='buyer'>Buyer</option>
                         <option value='service_provider'>Service Provider</option>
                         <option value='admin'>Admin</option>
                    </select>

                     <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
                     <input  type="text" name='user_email' class='sp_email'  placeholder='Enter email address'>

                     <label for="password" class='fw-bold'>PASSWORD</label>

                     <input type="password" name='user_password' class='sp_password' placeholder='Enter password'>

                     <div class="text-right">

                          <span><a class='text-secondary' href='forgot-password.php'>Forgot Password ?</a></span>

                     </div>

                     <div>
                        <button name='submit' class='btn btn-login btn-primary'>Login</button>
                        <a href='join-us.php' class='text-white btn btn-secondary'>Register</a>     


                     </div>
                     <?php include 'components/loader.php'; ?>

           

                  </div>
         </form>   



     </div>
<br><br>
     <?php include 'components/footer.php';?>
 </div>

<input type="hidden" id='details'  value='<?php echo$details;?>'>

<script>
     $(".btn-login").on("click", function(e){
        $("#loading-image").show();
         e.preventDefault();
         let details = $("#details").val();
         let formData = $("#login-form").serialize();
         $.ajax({
             type: "POST",
             url:"engine/inter-login-process.php",
             data:formData,
             success:function(response){
                $("#loading-image").hide();

                 if (response == 1) {
                    $("#login-form")[0].reset();

                     if(details!=""){
                        window.location.href = details;

                     }

                     else{
                         window.location.href = "dashboard/dashboard.php";
                     }
                        
                  }

                 else{
                      swal({
       
                           icon:"warning",
                           text:response,
                           title:"Notice",
                        //    timer:3000
                     });

                     $("input").css('border', '1px solid red');
                 }


             },

             error:function(err){
                   console.log(err);

             }

         });

     });

</script>

<!-- 
<script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get form data
                var sp_email = $('.sp_email').val();
                var sp_password = $('.sp_password').val();

                if (sp_email==''){
                   
                     swal({
                  
                          title:"Notice",
                          text:"Please enter your username",
                          icon:"warning",

                     });
 
                }


                else if(sp_password==''){
                     swal({
                  
                          title:"Notice",
                          text:"Please enter your password",
                          icon:"warning",

                     });

                }

                // Send AJAX request to the API
                $.ajax({
                    url: 'engine/login-process.php', // Your API endpoint
                    method: 'POST',
                    data: {
                        sp_email: sp_name,
                        sp_password: sp_password
                    },
                    success: function(response) {
                        if (response.success) {
                            // Successful login, store data via AJAX to session.php
                            $.post('session.php', {
                                user_id: response.user_id,
                                username: response.username
                            }, function() {
                                // Redirect to a protected page
                                window.location.href = '/dashboard.php';
                            });
                        } else {
                            // Show error message
                            $('#error-message').text(response.message || 'Login failed.');
                        }
                    },
                    error: function() {
                        // Handle AJAX error
                        $('#error-message').text('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script> -->


</body>
</html>