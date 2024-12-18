<?php session_start();
require 'engine/config.php';

if (isset($_SESSION['id'])) {
$user_id =  $_SESSION['id'];
$useremail = $_SESSION['email'];
}

if (isset($_SESSION['sp_id'])) {
$user_id =  $_SESSION['sp_id'];
$useremail =  $_SESSION['sp_email'];
}

$provider_id = $_SESSION['provider']; 

$package = $_SESSION['price'];

if (!isset($_SESSION['id']) && !isset($_SESSION['sp_id'])) {

   echo ("<script>location.href='login.php'</script>"); 
}

$mypay = mysqli_query($conn,"select * from service_providers where sp_id='".htmlspecialchars($provider_id)."'");

while ($pay=mysqli_fetch_array($mypay)) {

$package = "3500";

$provider_name = $pay['sp_name']; 

$provider_speciality = $pay['sp_speciality']; 

}

$txn_ref = time();


  ?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Provider pay </title>
   <?php include 'components/links.php' ?>
  <link rel="stylesheet" href="assets/css/pay-sp.css">
</head>

<body>

<?php include 'components/overlay-inner.php'; ?>

<br><br>

<div class="container text-center">
    
  <div class="card"> 
  
  <div class='card-header'>
      
    <i class='fa fa-hard-hat'></i>  
      
      
  </div>
  
    
     <h6><?php echo$provider_name;?></h6> <br>

     <p>I am interested in hiring your services as a <?php  echo$provider_speciality;?> . </p>   
  
     <span id="price">Price: &#8358;<?php echo $package;  ?></span><br>

<form method="POST" action="initialize-sp.php">

     <input type="hidden" name="redirect_url" value="https://e-stores.com/response.php">

     <input type="hidden" name="amount" value="<?php echo $package;  ?>">

     <input type="hidden" name="currency" value="NGN">

     <input type="hidden" name="provider_id" value="<?php echo$provider_id?>">

     <input type="hidden" name="name" value="<?php echo$provider_name?>">

     <input type="hidden" id="email" name="email" value="<?php echo$useremail?>">

     <input type="hidden" name="tx_ref" id="txn_ref" value="<?php echo$txn_ref;?>">

     <button type="submit" id='submit' name="submit" style="color: white;font-family: sans-serif;font-size:;" class="btn btn-danger ">PROCEED</button>

</form>

         <br><br>
     </div>

 </div>  
<br><br>

<?php include 'components/footer.php'; ?>

</body>

</html>
