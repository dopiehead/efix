<?php session_start();
 error_reporting(E_ALL ^ E_NOTICE);
 require 'engine/config.php'; 

if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
header("location:search-process.php?search=" .$query); 
 }  

 }  

 ?>  
 
 

 <?php
 $condition = "SELECT * from service_providers where sp_verified = 1";
 if (isset($_GET['search']) && !empty($_GET['search'])) {
     $search_page = explode(" ",mysqli_escape_string($conn,$_GET['search'])) ;
     foreach ($search_page as $text) {
          $condition .= " AND (`sp_location` LIKE '%".htmlspecialchars($text)."%' OR `sp_name` LIKE '%".htmlspecialchars($text)."%' OR `sp_bio` LIKE '%".htmlspecialchars($text)."%' OR `sp_category` LIKE '%".htmlspecialchars($text)."%' OR `sp_speciality` LIKE '%".htmlspecialchars($text)."%')";
     } 

$num_per_page = 20;
if (isset($_POST['page'])) {
     $page = $_POST['page'];
}
else{
     $page = 1;  
}
$initial_page = ($page-1)*$num_per_page; 
$condition .= " limit $initial_page,$num_per_page";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
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