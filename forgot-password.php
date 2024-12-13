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

                   <a onclick='history.go(-1)' class='fw-bold text-white mt-4' ><i class='fa fa-chevron-left'></i></a>
              </div>

         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1a3547" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
        
            </div>

            <form id="forget-form">

         <div class='container form-container d-flex flex-row flex-column g-5'>

        

            <h2 class='fw-bold'>Change password</h2>

           

            <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
            <input  type="text" name='sp_email'  placeholder='Enter email address'>

       
       

            <div>

                  <button class='btn btn-fogot btn-primary'>Submit</button>
                            

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
    Swal({
       
        icon:"success",
        text:"We've sent a password reset link to your email address.",
        title:"notice",
        timer:3000
    });  
}

$("#login-form")[0].reset();

else{
    swal({
       
        icon:"warning",
        text:response,
        title:"notice",
        timer:3000
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