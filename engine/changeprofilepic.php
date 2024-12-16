<?php session_start();

require 'config.php';

$myid = mysqli_real_escape_string($conn,$_POST['id']);

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  
    $imageFolder="../uploads/buyers/";
}


  if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) {
    $imageFolder="../uploads/service-provider/";     
  }

   $basename= mysqli_real_escape_string($conn,basename($_FILES["fileupload"]["name"]));

   $maxsize = 4 * 1024 * 1024;

    $myimage=$imageFolder.$basename;
    
    $imageExtension= strtolower(pathinfo($myimage,PATHINFO_EXTENSION));

    $allowed_extensions = array("jpg","jpeg","png","JPG","JPEG","PNG"); 

   if(!in_array($imageExtension,$allowed_extensions)){ echo "Please upload valid Image in Png and Jpeg only"; }

         $ImageSize=$_FILES['fileupload']['size'];

    if($ImageSize>$maxsize){

         echo "Image file size of 4mb limit is exceeded.";

    }

    $image_temp_name=$_FILES["fileupload"]["tmp_name"];

    $upload = move_uploaded_file($image_temp_name,$myimage);

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {

     $sql = "UPDATE user_profile SET user_image='".htmlspecialchars($myimage)."' WHERE id='".htmlspecialchars($myid)."'";

    }


    if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) {

        $sql = "UPDATE service_providers SET sp_img = '".$myimage."' WHERE sp_id = '".htmlspecialchars($myid)."'";

    }

  $bgt = mysqli_query($conn,$sql);

if ($bgt) { 

     if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
           $_SESSION['image']= $myimage;
     }

     if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) { 
           $_SESSION['sp_image']=$myimage;
       
     }

        echo "1";
 }

else{
      echo"Error in changing picture";
     
}

?>

