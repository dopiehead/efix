<?php session_start();

if (!isset($_SESSION['admin_id'])) {  ?>
 
<script>

$('#alert').html("<h4>You are not admin</h4>").show();
setTimeout(function() {
window.location.href ='login.php';
},500);

</script>


<div id="alert"></div>

<?php } ?>


<!DOCTYPE html>
<html>
<head>

<title>Efix | admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../assets/js/jquery-3.2.1.min.js"></script>
<script src="../../assets/js/sweetalert.min.js"></script>
<script src="../../assets/js/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="../../assets/css/flickity.min.css">
<link rel="stylesheet" href="../../assets/css/calltoaction.css">
<link rel="stylesheet" href="../../assets/css/hero.css">
<link rel="stylesheet" href="../../assets/css/ads.css">
<link rel="stylesheet" href="../../assets/css/footer.css">
<link rel="stylesheet" href="../../assets/css/btn_scroll.css">
<link rel="stylesheet" href="../../assets/css/banner.css">
<link rel="stylesheet" href="../../assets/css/loader.css">
<link rel="stylesheet" href="efix/../../../assets/css/overlay-inner.css">
<link rel="stylesheet" href="../../assets/css/admin.css">

</head>
<body>


<?php include '../../components/overlay-inner.php'; ?>

<div id="overlay" style="display: none;">
  <div class="loader"></div>
</div>

<br>

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
   <li class="link-active"><a style="color:white;opacity: 0.9;" href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a style="color:white;opacity: 0.9;" href="admin-notify.php"><i class="fa fa-envelope"></i> Messages</a></li>
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
    
 <small style='opacity:0.8;font-family:poppins,text-transform:capitalize;'><b><?php echo $_SESSION['admin_email']?></b></small>

&nbsp;<a href='engine/change-email.php?id=<?php echo urlencode($_SESSION['admin_id'])?>'><i class='fa fa-edit'></i></a>  
    
<br><br>
<input type="search" name="q" id="q" class="form-control" placeholder="Filter users">
<br>

<div id="user_type_home">
<select name="user_type" id="user_type" style="float: right;">
<option selected="" value="buyer">Buyer</option>
  <option value="service provider">Service Provider</option>

</select>

</div>

<div id="table">



</div>


</div>
</div>
</div>


<div id="popup-password">
<a onclick="togglepassword()" id="close-password">&times;</a>
<h6 class="text-center" id="h6">Change Password</h6>
<hr>
<div class="container">

<?php
require '../../../engine/config.php';
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
<div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>
 <br> 

</div>

<div id="popup-pay">
<a onclick="toggleAllow()" id="close-pay">&times;</a>
<h6 class="text-center" id="h6"><b style="color:skyblue;">Allow upload / Pay to Upload</b></h6>
<hr>
<div id='sliding' class="container" style='text-align:center;'>
 <b>Free upload&nbsp;</b>
<label class="switch">
  <input type="checkbox" id="toggleButton">
 <span class="slider round"></span>
</label>
<b>&nbsp;Paid Upload</b>
<div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</div>
<br> 
</div>


<!------------------------------------Dollar rate---------------------------------->


<div id="popup-dollar">
<a onclick="dollar()" id="close-dollar">&times;</a>
<h6 class="text-center" id="h6"><b style="color:skyblue;">Enter dollar rate</b></h6>
<hr>
<div class="container">
<form id="form-dollar">
<input type="text" name="dollar_rate" id="dollar_rate" style="border:1px solid rgba(0,0,0,0.1);box-shadow : 0px 0px 5px rgba(0,0,0,0.3);" class="form-control" placeholder="$ Enter dollar rate"><br>
<button class="btn btn-warning form-control">Update</button>
<div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>
<br> 
</div>



<!------------------------------------------footer--------------------------------------------------->


<?php
include '../../components/footer.php';
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
function toggleAllow() {
var popup = document.getElementById('popup-pay');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');

}

</script>





<script type="text/javascript">
var postData = "text";
$('.btn-warning').on('click',function(e){
var dollar_rate = $("#dollar_rate").val();
e.preventDefault();
$("#overlay").show(); 
$.ajax({
 type: "POST",
url: "engine/add-dollar.php",
data:  $("#form-dollar").serialize(),
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#overlay").hide(); 
if (response==1) {
swal({
text:"Dollar rate has been modified",
icon:"success",
});
$("#popup-dollar").hide(1000);
$('.row').removeClass('background-black');
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
$('.row').removeClass('background-black');
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
$("#q").on('keyup',function() {
$("#overlay").show();
var x = $('#q').val();
var user_type = $('#user_type').val();
if (x=='') {$("#reset").hide();}
else{
$("#reset").show();
}
getData(user_type,x);
});

$('#user_type').on('change',function(e) {
$("#overlay").show();
var user_type = $('#user_type').val();
if (user_type !='all') {
getData(user_type);
}
});

$(document).on('click','.btn-success',function(e) {
e.preventDefault();
$("#overlay").show();
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
$("#overlay").hide(); 
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
$("#overlay").show(); 
$.ajax({
 type: "POST",
url: "engine/delete-all.php",
data:{'id':id,'user_type':user_type},
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#overlay").hide();
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


<script>
$(document).ready(function() {
    // Function to handle toggle change
    $('#toggleButton').change(function() {
        var isChecked = $(this).prop('checked') ? 1 : 0; // Convert boolean to 1 or 0
        $("#loading-image").show();
        // AJAX call to update server
        $.ajax({
            type: "POST",
            url: "engine/update-status.php", // PHP script to handle update
            data: { status: isChecked },
            success: function(response) {
              $("#loading-image").hide();
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