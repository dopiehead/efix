<?php session_start();
 error_reporting(E_ALL ^ E_NOTICE);
 require 'engine/configure.php'; 
 require 'engine/get-dollar.php'; 
if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
header("location:search-process.php?search=" .$query); 
 }  

 }  

 ?>   

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Serach result</title>
</head>
<body>
    <?php include 'components/overlay-inner.php'; ?>
    <br><br>
         <div>















         
            


         </div>
  

    <br><br>
    <?php include 'components/footer.php';?>
    
</body>
</html>