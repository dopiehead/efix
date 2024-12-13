<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'?>
    <link rel="stylesheet" href="assets/css/join-us.css">
    <title>Join-us</title>
</head>
<body>
     <?php include 'components/overlay-inner.php'; ?>
     <br><br>
     <div class='container'>

         <div id='row_home'>
	
              <div class=" row">

                 <div class="col-md-4">
    
                      <div id="service_provider">
           
                         <input type="radio" id="user" value="register.php" name="user">
    
                         <img src="assets/icons/carbon_service-id.png">
    
                         <p>I‘m a service provider.</p>
     
                      </div>
    
                                  <br>
    
                 </div>

                <div class="col-md-4">
    
                     <div id="vendor">


                          <input type="radio" id="user" value="register-vendor.php" name="user">

                          <img src="assets/icons/hand.png">

                          <p>I’m a Vendor, here to sell.</p>

                      </div>

                               <br>

                </div>
    
    
    
                 <div class="col-md-4">
    
                      <div id="buyer">
    
                          <input type="radio" value="register-user.php" id="user" name="user">
    
                          <img src="assets/icons/icons8_buy.png">
    
                           <p>I’m here to buy or get service provider</p>
    
                     </div>
    
    
                                                  <br>
    
                  </div>
    
    
                  <button name="btn-create" id="btn-create" class="form-control btn btn-secondary ">Create account</button>
    
       
             </div>
    
             <p id="login_button" style="text-align: center;">Already have an account? <a href="login.php">Login</a></p>
    
    
    
    
          </div>
    
    
      </div>
    


     </div>
    
     <br><br>

     <?php include 'components/footer.php'; ?>

     <script>

             $(document).ready(function(){

             $('#btn-create').click(function(){

             let selectedValues = [];

             $("input[name='user']:checked").each(function() {

             selectedValues.push($(this).val());

             window.location.href = selectedValues;

                  });

      
             });
         });

     </script>

</body>
</html>
