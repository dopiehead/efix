<?php session_start();
if (!isset($_SESSION['admin_id'])) { ?>
<script>
window.location.href ='login.php';
</script>
<?php } ?>


<!DOCTYPE html>
<html>
<head>

<title>E-stores | admin</title>

  <?php echo '../components/links.php'; ?>
  <link rel="stylesheet" href="../assets/css/admin-notify.css">

</head>
<body>

<?php include '../components/overlay-inner.php'; ?>

<br>

<br>

<div style="padding: 20px;">

<div class="row">

<div class="col-md-2">

<div id="main">

<h6>Welcome Admin</h6>

</div>

<br>

<ul>
   <li><a style="color:white;opacity: 0.9;" href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="link-active"><a style="color:white;opacity: 0.9;" href="admin-notify.php"><i class="fa fa-envelope"></i> Messages</a></li>
   <li>    
<a style="cursor: pointer;" onclick="settings()"><i  class="fa fa-gear"></i> Settings &gt;</a>
<ul id="subsettings" class="active">
<li><a onclick="togglepassword()">Change Password</a></li>
<li><a onclick="dollar()"><i class="fa fa-money"></i> Dollar rate ($)</a></li>
<li><a onclick="toggleAllow()">Allow Upload / Pay </a></li>
<li><a style="text-decoration:none;color:white;opacity: 0.8;" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>    
</li>
</ul>
<br>
</div>

<div class="col-md-10">






<div style="padding: 20px;">




<?php  

require 'engine/config.php'; 
$num_per_page =20;
if (isset($_POST['page'])) {
 $page = $_POST['page'];
}
else{
$page = 1;  
}
$initial_page = ($page-1)*$num_per_page; 

$getNotification =mysqli_query($conn,"select * from newsfeed order by id desc limit $initial_page,$num_per_page");

if ($getNotification->num_rows>0) {
  
while ($row = mysqli_fetch_array($getNotification)) {
  
$id = $row['id'];
$name =  mysqli_escape_string($conn,$row['name']);
$subject = mysqli_escape_string($conn,$row['subject']);
$message =  mysqli_escape_string($conn,$row['message']);
$email =  mysqli_escape_string($conn,$row['email']);
$date =   mysqli_escape_string($conn,$row['date']);

?>

<div id="notification" class="container" style="font-size:13px;">


<table class='table table-responsive'>
  <thead>
    <tr>
      <th>UserName</th>
      <th>Message</th>
      <th>Action</th>
      <th>Date</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><?php echo$row['name']; ?></td>
      <td><?php echo$row['compose']; ?></td>
      <td><a class="btn btn-warning" href="mailto:<?php echo$email ?>">Reply <i class="fa fa-chevron-right"></i></a>  </td>
      <td><span id="time"><?php echo$row['date']; ?></span></td>
  </tr>
</tbody>
</table>
 







</div>

<div>
<?php } 


$radius=3;
$pageres = mysqli_query($conn,"select * from newsfeed");
$numpage = $pageres->num_rows;
$total_num_page =ceil($numpage/$num_per_page);
echo "<br>";
if ($page>1) {
$previous = $page-1;
echo'<span id="page_num"><a href="admin-notify.php?page='.$previous.'" style="" class="btn-success prev" id="'.$previous.'">&lt;</a></span>';
}
for ($i=1; $i<=$total_num_page; $i++) { 
if(($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
if($i == $page) {echo'<span id="page_num"><a href="admin-notify.php?page='.$i.'" class="btn btn-success active-button" id="'.$i.'">'.$i.'</a></span>';}
  }
elseif($i == $page - $radius || $i == $page + $radius) {
 echo "... ";
}
elseif ($page==$i) {
}
else{
echo'<span id="page_num"><a href="admin-notify.php?page='.$i.'" class="btn btn-success" id="'.$i.'">'.$i.'</a></span>';
}
} 
if ($page<$total_num_page) {
$next = $page+1;
echo'<span id="page_num"><a href="admin-notify.php?page='.$next.'" style="" class="btn btn-success next" id="'.$next.'">&gt;</a></span>';
}
}

else{
echo"<div style='margin:50px 10px;text-align:center;opacity:0.7;'>There are no messages in your inbox</div>";
}

?>


</div>


</div>
</div>
</div>


<div id="popup-pay">
<a onclick="toggleAllow()" id="close-pay">&times;</a>
<h6 align="center" id="h6"><b style="color:skyblue;">Allow upload / Pay to Upload</b></h6>
<hr>
<div id='sliding' class="container" style='text-align:center;'>
 <b>Free upload&nbsp;</b>
<label class="switch">
  <input type="checkbox" id="toggleButton">
 <span class="slider round"></span>
</label>
<b>&nbsp;Paid Upload</b>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</div>
<br> 
</div>













<div id="popup-password">
<a onclick="togglepassword()" id="close-password">&times;</a>
<h6 class="text-center" id="h6">Change Password</h6>
<hr>
<div class="container">

<?php


require 'engine/config.php';
 $sql="select * from admin where admin_id='".htmlspecialchars($_SESSION['admin_id'])."'";
   $dbc=mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($dbc)) {
   $myid=$row['admin_id'];
    $mypassword=$row['admin_password'];
    
    
  
  }
    
 ?>

  <form method="POST" id="changepassword" enctype="multipart/form-data" >
  <input type="hidden" name="id" value="<?php echo$_SESSION['admin_id']?>">
  <input style="font-size:14px;" type="password" name="opassword" id="opassword" class="form-control" value="" placeholder="Enter old password"><br>
  <input style="font-size:0.8rem;" type="password" name="password" id="password" class="form-control" value="" placeholder="Enter new password"><br>
  <input style="font-size:0.8rem;" type="password" name="cpassword" id="cpassword" class="form-control" value="" placeholder="Confirm password" ><br>
  <label style="font-size:0.8rem;">User name: <b>Admin</b></label> 
  <b><input type="submit" name="submit" id="btn-changepassword" value="Update password" class="btn btn-changepassword form-control" style="color: white;font-size:0.8rem !important;"></b><br>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>
 <br> 

</div>

<!------------------------------------Dollar rate---------------------------------->

<div id="popup-dollar">
<a onclick="dollar()" id="close-dollar">&times;</a>
<h6 align="center" id="h6"><b style="color:skyblue;">Enter dollar rate</b></h6>
<hr>
<div class="container">
<form id="form-dollar">
<input type="text" name="dollar_rate" id="dollar_rate" style="border:1px solid rgba(0,0,0,0.1);box-shadow : 0px 0px 5px rgba(0,0,0,0.3);" class="form-control" placeholder="$ Enter dollar rate"><br>
<button class="btn btn-warning btn-dollar form-control">Update</button>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>


 <br> 

</div>

</div>

<!------------------------------------------footer--------------------------------------------------->


<?php
include 'footer.php';
?>



<script type="text/javascript">
function togglepassword() {
var popup = document.getElementById('popup-password');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');
}

</script>



<script type="text/javascript">
function dollar() {
var popup = document.getElementById('popup-dollar');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');

}

</script>




<script type="text/javascript">
var postData = "text";
$('.btn-dollar').on('click',function(e){
var dollar_rate = $("#dollar_rate").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
 type: "POST",
url: "engine/add-dollar.php",
data:  $("#form-dollar").serialize(),
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
text:"Dollar rate has been modified",
icon:"success",
});
$("#popup-dollar").hide(1000);
}
else{
swal({
icon:"error",
text:response
 });
$("#form-dollar")[0].reset();

}
 },
error: function(jqXHR, textStatus, errorThrown) {
 console.log(errorThrown);
}

        });

    });

</script>



<script type="text/javascript">
var postData = "text";
$('#btn-changepassword').on('click',function(e){
var password = $("#password").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
type: "POST",
url: "engine/edit-password.php",
data:  $("#changepassword").serialize(),
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
 text:"Password has been modified",
  icon:"success",
});
$("#popup-password").hide(1000);             
}
else{
 swal({

 title:"Oops!!", 
icon:"error",
text:response
});
 $("#form-signup").find('input:text').val('');
$("#form-signup").find('input:password').val('');
$("#form-signup").find('input:email').val('');
$('input:checkbox').removeAttr('checked');
 }
 },
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown);

            }

        })

    });





</script>


<script type="text/javascript">

$("#loading-image").hide();
$("#q").on('keyup',function() {
var x = $('#q').val();
var user_type = $('#user_type').val();
if (x=='') {$("#reset").hide();}
else{
$("#reset").show();
}
getData(user_type,x);
});

$('#user_type').on('change',function(e) {
var user_type = $('#user_type').val();
if (user_type !='all') {
getData(user_type);
}
});

$(document).on('click','.btn-success',function(e) {
e.preventDefault();
var page = $(this).attr('id');
var user_type = $('#user_type').val();
var x = $('#q').val();
if (page!='') {
$('.btn-success').removeClass('active-button');
$(this).addClass('active-button');
}

getData(user_type,x,page);
  
});

function getData(user_type,x,page) {
$.ajax({
url:"admin-engine.php",
type:"POST",
data:{'user_type':user_type,'q':x,'page':page},
success:function(data) {
$("#loading-image").hide();
$("#table").html(data).show();

  }


});


};



</script>



<script>
  
$('#user_type').trigger('change');

</script>


<script>
$(document).ready(function(){
    $(document).on('click','.btn-danger',function(e){
        if(!confirm('Are you sure you want to delete this message?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});

</script>


<script>

$(document).on('click','.check_all',function() {

 var isChecked = $(this).prop('checked');

 $('.checkbox').prop('checked', isChecked);

 if (isChecked) {

 $('.delete_all').css("opacity","1");

}

else{

 $('.delete_all').css("opacity","0");


}
 
});


</script>




<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js"></script>

<script src="assets/js/overlay.js"></script>

<script>
  
function settings() {
 
$("#subsettings").toggleClass("active");

}

</script>




<script type="text/javascript">
var postData = "text";
$(document).on('click','.delete_all',function(e){
  if(!confirm('Are you sure you want to delete this message?')){
            e.preventDefault();
            return false;
       
var user_type = $("#user_type").val();
var id = $(".check").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
 type: "POST",
url: "engine/delete-all.php",
data:{'id':id,'user_type':user_type},
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
text:"These members have been deleted successfully",
icon:"success",
});

}
else{
swal({
icon:"error",
text:response
 });



}
 },
error: function(jqXHR, textStatus, errorThrown) {
 console.log(errorThrown);
}

        });

 }

    });

</script>


<script type="text/javascript">
function toggleAllow() {
var popup = document.getElementById('popup-pay');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');

}

</script>

<script>
$(document).ready(function() {
    // Function to handle toggle change
    $('#toggleButton').change(function() {
        var isChecked = $(this).prop('checked') ? 1 : 0; // Convert boolean to 1 or 0
        
        // AJAX call to update server
        $.ajax({
            type: "POST",
            url: "engine/update-status.php", // PHP script to handle update
            data: { status: isChecked },
            success: function(response) {
               swal({icon:"success",text:response});
            },
            error: function(xhr, status, error) {
                swal('AJAX Error: ' + status, error);
            }
        });
    });
});
</script>


</body>
</html>