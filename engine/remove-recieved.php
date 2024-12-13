<?php 
session_start();
if (isset($_POST['id'])) {
require 'configure.php';
$id= mysqli_real_escape_string($conn,$_POST['id']);
$sql="UPDATE messages SET is_receiver_deleted = 1 where sender_email ='".htmlspecialchars($id)."'";
$query=mysqli_query($conn,$sql);
if ($query) {
	echo"1";
}
else{

	echo "Error in deleting message";
}

  
} ?>