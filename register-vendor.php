
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

               <a href='index.php' class='text-white logo mt-5'>LOGO</a>

               <a onclick='history.go(-1)' class='fw-bold text-white mt-4' ><i class='fa fa-chevron-left'></i></a>
         </div>

         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1a3547" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
         <div class='container form-container d-flex flex-row flex-column g-5'>

            <h2 class='fw-bold'>Register</h2>

            <!-- form -->

            <form id='signup_vendors' class='d-flex flex-row flex-column'>

            <label for="name"  class='fw-bold'> Name</label>

            <input type="text" placeholder="Business name" name="business_name">

            <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
            <input type="text"   placeholder="Business email"  name="business_email">

            <label for="password"  class='fw-bold'>PASSWORD</label>

            <input type="password"   placeholder="Password"  name="business_password">

            <label for="password"  class='fw-bold'>CONFIRM PASSWORD</label>

            <input type="password" name='confirm_password'  placeholder='Confirm password'>

            <label for="merchant type"  class='fw-bold'>Select Merchant type</label>

            <select name="merchant_type" class="border-4 mt-1 bg-grey text-capitalize text-secondary">

                <option value="">Select business type</option>  

                <option value="importer">Importer</option>  

                <option value="wholesaler">Wholesaler</option>  

                <option value="retailer">Retailer</option>    

                <option value="manufacturer">Manufacturer</option>   

            </select>

           <label for="location" class='fw-bold'>LOCATION</label>
         
           <input type="text"   placeholder="Business address"  name="business_address">

           <label for="phone number" class='fw-bold'>PHONE NUMBER</label>

           <input type="text"   placeholder="Business contact"  name="business_contact">

           <label for="company description" class='fw-bold'>COMPANY DESCRIPTION</label>

           <input type="text"   placeholder="Company description"  name="company_description">

           <input type="hidden" value="0"  name="item_sold">

           <input type="hidden" value="0"  name="bank_name">

           <input type="hidden" value="0"  name="account_number">

           <input type="hidden" value="0"  name="pay">

           <input type="hidden" value="0" name="verified"> 

           <input type="hidden" value="0" name="status"> 

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

  $('#signup_vendors').on('submit',function(e){

         e.preventDefault();

         $("#loading-image").show();

         $('#btn-signup').prop('disabled', true);
        
        var formdata = new FormData();

      $.ajax({

            type: "POST",

            url: "engine/signup-vendor-process.php",

            data:new FormData(this),

            cache:false,

            processData:false,

            contentType:false,

             success: function(response) {

             $("#loading-image").hide();

     if (response==1) { 

              swal({
                       text:"A verification link has been sent to the email provided",
                      icon:"success",

              });

              $("#form-signup")[0].reset();
               
         } 
 
     else{
              swal({

                icon:"error",
              	text:response

              });

              $('#btn-signup').prop('disabled', false);
            
              $('input').css('border-color','red');

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });

</script>

</body>
</html>