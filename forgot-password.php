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

                  <a href='index.php' class='text-white logo mt-5'><img src ='assets/img/logo.png' alt='efix'></a>

                   <a onclick='history.go(-1)' class='fw-bold text-white mt-4' ><i class='fa fa-chevron-left'></i></a>
              </div>

         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3a724" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
        
            </div>

            <form id="forget-form">

         <div class='container form-container d-flex flex-row flex-column g-5'>

        

             <h2 class='fw-bold'>Change password</h2>

             <br><br>
             <label for="email" class='fw-bold'>SELECT USER TYPE</label>
             <select name="user_type" class="form-control text-dark bg-light border-0" style="opacity: 0.8">
     
                 <option value="buyer">Buyer</option>
	        
	             <option value="service provider">Service Provider</option>

             </select>

            <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
            <input  type="text" name='email'  placeholder='Enter email address'>

            <div>

                  <button type='button' class='btn btn-forgot btn-primary'>Submit</button>
                            

            </div>

           

         </div>
         </form>   



     </div>
<br><br>
     <?php include 'components/footer.php';?>
 </div>


<script>
$(".btn-forgot").on("click", function(e){
    e.preventDefault();
let formData = $("#forget-form").serialize();

      $.ajax({
          type: "POST",
          url:"engine/forget-process.php",
          data:formData,
          success:function(response){
          if (response == "1") {
             swal({  

                  icon:"success",
                  text:"We've sent a password reset link to your email address.",
                  title:"Success",
                  timer:3000

             });  

             $("#forget-form")[0].reset();
}

else{

    swal({
       
        icon:"warning",
        text:response,
        title:"Notice",
        // timer:3000

    });
}


},

error:function(err){
console.log(err);


}


});


});




</script>


</body>
</html>