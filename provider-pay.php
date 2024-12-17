<?php session_start();

require 'engine/config.php';

if (isset($_SESSION['id'])) {
$user_id = 	$_SESSION['id'];
}

if (isset($_SESSION['sp_id'])) {
$user_id = 	$_SESSION['sp_id'];
}

if (isset($_POST['id'])) {
$id= $_POST['id'];
$sql = "SELECT * FROM service_providers where sp_id ='".htmlspecialchars($id)."'";
$query=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query)) {
$_SESSION['provider'] = $row['sp_id']; 
$_SESSION['price'] = $row['pricing']; 

echo "1";
}
}


  
 ?>