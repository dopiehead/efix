<?php
session_start();

if (!isset($_SESSION["id"]) &&  !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
exit();
}
?>

<?php 

if (isset($_SESSION['sp_id'])) {
$sender = $_SESSION['sp_email'];
$senderName= $_SESSION['sp_name'];
}
if (isset($_SESSION['id'])) {
$sender = $_SESSION['email'];
$senderName= $_SESSION['name'];
}

?>
<?php
require 'engine/configure.php';
if (isset($_GET['user_name'])) {
$user_name= mysqli_real_escape_string($conn,$_GET['user_name']);}
$sql="UPDATE messages SET has_read = 1 where sender_email='".htmlspecialchars($user_name)."' and receiver_email = '".htmlspecialchars($sender)."'";
$query=mysqli_query($conn,$sql);
?>
<DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
	     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<style type="text/css">
	i{

		color:rgba(0,0,20,0.8);
	}	
body{
 font-family: sans-serif;
background-image: linear-gradient(rgba(192,203,192,0.2),rgba(243,243,243,0.2));
height: 0rem;

}

#userProfile{

width: 100%;background-color:rgba(0,70,90,0.8);background-color:rgba(0,70,90,0.8); border:1px solid transparent;box-shadow:0px 0px 4px green;height:80px;padding:3px 20px;color: white;text-transform: capitalize;}


#receiverbox{

color:white; width:65%;padding:8px 20px;border:1px solid transparent;border-radius:0px 40px 40px 40px; background:rgba(255,30,0,0.5);float: left;margin-bottom:10px;font-family:poppins;font-size:14px;
}


#senderbox{
background-color: rgba(0,70,90,0.4);padding:8px 20px; color: white;width:65%;float: right;margin-top: 10px;border-radius:40px 40px 0px 40px;margin-bottom: 15px;font-size:;font-family:poppins;font-size:14px;
}

#messagebox{

background:rgba(243,243,243,9.8);margin-bottom:15px; width:100%;color: white;margin-top:15px;height:30rem;overflow-y:auto;
	
}

#message{

width:100%;
}


#submit{
position: absolute;
top:36.5rem;
right:3.4%;
height:83px;

}


#name{


	color: black;text-transform: ;font-size:13px;

	display: none;
}

#date{

	margin-top: 45px;
}

a{

	color: white;
	text-decoration: none;
}

a:hover{
	color: rgba(255,145,50,1);
	text-decoration: none;
}

	</style>

</head>
<body>
<div class="" style=" position: fixed;top:0px;width: 100%;">
<div id="userProfile" >
<a href="messages.php"><i style="color: white;font-weight: bold;" class="fa fa-chevron-left"></i>&nbsp; &nbsp; </a><br>
<span style="margin-top: 20px;"><a href="merchant.php?id=<?php echo$id?>">&nbsp; &nbsp;<?php echo substr($user_name,0,4);?></a></span>



</div>

</div><br><br><br>

<?php 
require 'engine/configure.php';  
$read = mysqli_query($conn,"select * from messages where is_sender_deleted = 0  and sender_email='".htmlspecialchars($sender)."' and receiver_email = '".htmlspecialchars($user_name)."' or sender_email='".htmlspecialchars($user_name)."' and receiver_email = '".htmlspecialchars($sender)."'");
?>
<div id="messagebox" class="container" style="">
<div id="parent"><div id="child">
<?php

	while ($messages=mysqli_fetch_array($read)) {
    if ($messages['sender_email']==$user_name) {
?><br>
		  	<div id="receiverbox"  style=""  class="text-left">
            <b id="name" style=""><?php echo$messages['sender_email'].""?></b>	
            <?php echo$messages['compose']."<br>";?>

            <i id="date" style='font-size:13px;font-family:sans-serif;'>Received on: <?php echo$messages['date']."";?></i>

		  	</div><br>

<?php		  	
		  }


		   if ($messages['receiver_email']==$user_name) {
?>		  
<br>
	<div id="senderbox"  class="text-right">
     <b id="name" ><?php echo$messages['sender_email'].""?></b>
    <?php echo$messages['compose']."<br>"?>

<?php
if ($messages['has_read']==1) {
 ?> 

<i><?php echo"<i id='date' style='font-size:13px;color:green;font-family:sans-serif;'>seen on: ".$messages['date'].'</i>';?></i> &nbsp; 

<?php
}

else{
?>

<i><?php echo"<i id='date' style='font-size:13px;font-family:sans-serif;'>sent on: ".$messages['date'].'</i>';?></i> &nbsp; 

<?php
}
?>
		  	</div><br>
            

	<?php	  	
		  

		}
	}


 ?>
</div>
</div>
</div>

	<div class="container">
<form method="post" id="message-form">	
<input class="form-control" type="hidden" id="user_name" name="user_name" value="<?php echo$sender?>">
<input type="hidden" name="has" value="0" placeholder="" class="form-control">
<input type="hidden" name="is_sender_deleted" value="0">
<input type="hidden" name="is_receiver_deleted" value="0">
<input type="hidden" name="sentto" value="<?php echo$user_name; ?>" placeholder="" class="form-control">

<?php
require 'engine/configure.php';
$sub = mysqli_query($conn,"select * from messages where sender_email='$sender' and receiver_email = '".htmlspecialchars($user_name)."' or sender_email='".htmlspecialchars($user_name)."' and receiver_email = '$sender' order by id desc limit 1");
while ($get = mysqli_fetch_array($sub)) {
if (empty($get['subject'])) {
		$subject =  "No subject found";
	}	
else{
$subject = $get['subject'];
}

}

?>

  <input type="hidden" name="subject" placeholder="" value="<?php echo$subject; ?>" class="form-control">
  <input type="hidden" name="sentby" value="<?php echo$sender; ?>">
  <input type="hidden" name="name" value="<?php echo$senderName; ?>">
  <input type="hidden" id="receiver_name" name="receiver_name" value="<?php echo$user_name?>">
  <textarea class="container form-control" name="message" id="message" rows="3" wrap="physical" placeholder="Type message here">
  </textarea><div class="text-right">
  	
<button type="button" name="submit" id="submit" class="btn btn-success" style="color:white;" ><i class="fa fa-paper-plane-o"></i> Send</button></div>
</form>

<span class="result"></span>
</div>


<script>
	
$(document).ready(function() {
$('#submit').on('click',function(e) {
e.preventDefault();
$('#message-form').serialize();
$.ajax({
         type: "POST",
         url: "engine/message-process.php",
          data:  $('#message-form').serialize(),
          cache:false,
           contentType: "application/x-www-form-urlencoded",
           success: function(response){
          $('.result').html(response);
          $('.result').fadeOut('slow');
          $('#message').val('');
          var objDiv = document.getElementById('messagebox');
           objDiv.scrollTop = objDiv.scrollHeight;

             }

	});
});	
	           setInterval(function() {
               $("#parent").load(location.href + " #child");  
                },2500);

});
</script>
</body>
</html>