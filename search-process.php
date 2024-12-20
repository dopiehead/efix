<?php session_start(); 

 error_reporting(E_ALL ^ E_NOTICE);

 require 'engine/config.php';

if(isset($_POST["submit"]))   {  

      if(!empty($_POST["search"]))   {  

                $query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));

                 header("location:search-process.php?search=" .$query); 
 }  

 }  

 $condition = "SELECT * FROM service_providers WHERE sp_verified = 1 AND sp_location LIKE '".$myaddress."'";

 if (isset($_GET['search']) && !empty($_GET['search'])) {

      $search_page = explode(" ",mysqli_escape_string($conn,$_GET['search'])) ;

      foreach ($search_page as $text) {

           $condition .= " AND (`sp_location` LIKE '%".htmlspecialchars($text)."%' OR `sp_name` LIKE '%".htmlspecialchars($text)."%' OR `sp_bio` LIKE '%".htmlspecialchars($text)."%' OR `sp_category` LIKE '%".htmlspecialchars($text)."%' OR `sp_speciality` LIKE '%".htmlspecialchars($text)."%')";
     } 

 }

     if(isset($_SESSION['address']) && !empty($_SESSION['address'])){

          $myaddress = $_SESSION['address'];
    
          $getadress = explode(" ", $_SESSION['address']);

          foreach ($getadress as $address) {
    
         $condition .= " AND sp_location like '%".$address."%' OR sp_location like '%".$address."%'";

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
    <link rel="stylesheet" href="assets/css/search-process.css">
    <title>Search result</title>
</head>
<body>
    <?php include 'components/overlay-inner.php'; ?>

    <br><br>
   
    <div class='banner-container'>

       <h2 class='fw-bold text-white '>Search Page </h2>

    </div>

    <br>


<div class='container'>

      <div class='d-flex flex-md-row flex-column'>

            <div class='d-flex flex-row flex-column g-3 col-md-4'>

                 <h3 class='fw-bold'>Filter</h3><br>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="sp_category" id="">
                    
                     <option>Category</option>
               
                 </select>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="sp_speciality" id="">
                    
                     <option>Speciality</option>
               
                 </select>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="sp_location" id="">
                    
                     <option>Location</option>
                    
                 </select>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="pricing" id="">

                     <option>Pricing</option>
                    
                 </select>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="sp_experience" id="">
                    
                     <option>Experience</option>
                    
                </select>

                 <select class='bg-light text-secondary border-0 mt-2 py-2' name="e_verify" id=""><option>Verified</option></select>

          </div>

                <div class='d-flex flex-column flex-md-row justify-content-between align-items-center bg-light col-md-8'>
               
      <?php if($datafound > 0) {
          
           while ($row = mysqli_fetch_array($data)) {

                     $sp_img = $row['sp_img'];
                     $sp_name = $row['sp_name'];
                     $sp_category = $row['sp_category'];
                     $sp_location = $row['sp_location'];
               ?>

           <div class='sp_package border border-secondary d-flex flex-row flex-column'>

                <img src="<?php echo"efix/".$sp_img; ?>" alt="efix">

                <span class='bar'>
                    
                     <span class='check-container text-white border-0'>
                          <i class='fa fa-check fa-1x'></i>
                     </span>
                   
                    
                     <span class='bg-success pole px-5 rounded rounded-pill'><span style='visibility:hidden;font-size:5px !important;'>1</span></span>
               
                </span>
                
                <div class='px-2 py-1 text-sm text-capitalize d-flex flex-row flex-column'>

                     <span class='fw-bold'><?php echo $sp_name; ?></span>
               
                     <span><?php echo $sp_category; ?></span>

                      
                </div>

           </div>

           <?php } } else {
                
                echo "No service provider found.";
               
           }?>

           </div>
            
         </div>

      </div>
  

    <br><br>
    <?php include 'components/footer.php';?>
    
</body>
</html>