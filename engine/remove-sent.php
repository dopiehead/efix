<?php 

require 'configure.php';
$id= mysqli_real_escape_string($conn,$_POST['id']);
$sql="UPDATE messages SET is_sender_deleted = 1 where receiver_email ='".htmlspecialchars($id)."'";
$query=mysqli_query($conn,$sql);

if ($query) {

	echo "1";
	exit();
}
else{

	
}

  ?>