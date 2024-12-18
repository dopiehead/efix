<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE); 


if (!isset($_SESSION['admin_id'])) { ?>
  
<script>

alert("You are not admin");

setTimeout(function() {

window.location.href ='login.php';
  
},2500);
  
</script>

<?php } ?>






<?php
require 'configure.php';
session_start();
$myid = $_SESSION['admin_id'];
$mypassword =$_SESSION['admin_password'];
$mypassword = mysqli_escape_string($conn,$_POST['password']);
$opassword =  mysqli_escape_string($conn,$_POST['opassword']);
$cpassword =  mysqli_escape_string($conn,$_POST['cpassword']);
$secret_password = sha1($mypassword);
$opassword=$_SESSION['admin_password'];
if ($mypassword=='') {
echo "Password field is required";
}
elseif ($cpassword=='') {
echo "Confirm new password";
}
elseif ($mypassword!=$cpassword) {
echo "Password mismatch";
}

else{
if(!empty($mypassword)){
$sql="update admin set admin_password='".htmlspecialchars($secret_password)."' where admin_id='".htmlspecialchars($myid)."'";
$bgt=mysqli_query($conn,$sql);
if ($bgt) { 
$_SESSION['admin_password'] = $mypassword;   
	 echo "1";
	}
else{ echo "Error in saving record";
}

}
else{
echo"Password field is required"; 
    
}


}
?>

