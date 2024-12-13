<?php session_start();

require('../engine/config.php');

if(isset($_SESSION['sp_email'])){

     $sp_email = $_SESSION['sp_email'];
     $get_user = mysqli_query($conn, "SELECT * FROM service_providers WHERE sp_email = '". $sp_email."' and sp_verified = 1");
     if($get_user->num_rows>0){ 
         while($row = mysqli_fetch_array($get_user)){
              $user_id = $row["sp_id"];
              $user_name = $row["sp_name"];
              $user_email = $row["sp_email"];
              $user_img = $row["sp_img"];
              $user_phone = $row["sp_phonenumber1"];
              $user_phone1 = $row["sp_phonenumber2"];
              $user_location = $row["sp_location"];
              $user_experience = $row["sp_experience"];
              $user_bio = $row["sp_bio"];

          }

      }

    }


    
elseif(isset($_SESSION['email'])){

    $email = $_SESSION['email'];
    $get_user = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_email = '". $email."' and verified = 1");
    if($get_user->num_rows>0){ 
        while($row = mysqli_fetch_array($get_user)){
             $user_id = $row["id"];
             $user_name = $row["user_name"];
             $user_email = $row["user_email"];
             $user_img = $row["user_image"];
             $user_phone = $row["user_phone"];            
             $user_location = $row["user_location"];
        

         }

     }

   }


   else{
    header("location:../login.php");
    exit(); 
   }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../dashboard/css/messages.css">
    <link rel="stylesheet" href="../dashboard/css/main-part.css">
    <title>Profile</title>
</head>
<body>
    <span class='ml-2 mt-1'> 
       
          <i id="fa-bars" class='fa fa-bars fa-1x '></i>
</span>
     <div class='side-bar'>
        
      <?php include 'components/sidenav.php'; ?>
         <!-- main part -->
         <div class='main-part'>               
              <div class='header-content'>              
                   <div>
                         <h4 class='fw-bold'>Messages</h4>
                    </div>
                   <div class='notification-content'>                       
                         <span class='bg-light text-dark'><i class='fa fa-search'></i></span>
                         <span class='bg-light text-dark'><i class='fa fa-bell'></i></span>
                         <div class='bg-light rounded rounded-pill d-flex g-5 px-3 '>
                             <img src="../assets/img/profile.jpg" class='rounded rounded-circle' alt="">
                             
                                     <a class='d-flex align-items-center text-dark text-decoration-none'><i class='fa fa-caret-down'></i></a>                      
                         </div>

                   </div>

             </div>


         

              <!-- end of header content -->


            
<div id="label">
<?php
$you = null;
require 'engine/config.php';
$limit = 2;  
$getQuery = "select * from messages where receiver_email = '$user_email' and is_receiver_deleted = 0 group by sender_email";    
$result = mysqli_query($config, $getQuery);  
$total_rows = $result->num_rows;    
$total_pages = ceil ($total_rows / $limit);    
if (!isset ($_GET['page']) ) {  
$page_number = 1;  
} else {  
$page_number = $_GET['page'];  
 }    
$initial_page = ($page_number-1) * $limit;
$time = time();
$inbox="select *  from (
select * from messages where receiver_email = '$user_email' and is_receiver_deleted = 0 and has_read = 0 order by has_read asc limit 18446744073709551615) as sub group by sender_email limit $initial_page,$limit";
$in =mysqli_query($config, $inbox);
$datafound=$in->num_rows;
?>
<table class=' container table-responsive w-100'>
<thead>
<tr>
<th id="inbox">Inbox(<?php  echo$datafound ?>)</th>
<th><a href="" id="refresh">Refresh</a></th>
<th><a class="mark" >Mark as Read</a></th>
</tr>
</thead>
</table>
<br><br><br>
<?php
require 'engine/config.php';
$limit = 2;  
$getQuery = "select * from messages where receiver_email = '$user_email' and is_receiver_deleted = 0 group by sender_email";    
$result = mysqli_query($config, $getQuery);  
$total_rows = $result->num_rows;    
$total_pages = ceil ($total_rows / $limit);    
if (!isset ($_GET['page']) ) {  
$page_number = 1;  
} else {  
$page_number = $_GET['page'];  
}    
$initial_page = ($page_number-1) * $limit;
$time = time();
$inbox="select *  from (
select * from messages where receiver_email = '$user_email' and is_receiver_deleted = 0 order by has_read asc limit 18446744073709551615) as sub group by sender_email limit $initial_page,$limit";
$in =mysqli_query($config, $inbox);
$datafound=$in->num_rows;
echo"<table class='table-responsive'><th><tr style='background-color:rgba(192,192,192,0.1);'>
<td id='td-action'>Action</td>
<td id='td-from'>From</td>
<td id='td-subject'>Subject</td>
<td id='td-date'>Date</td>
</tr>
</th>";
?>
</div>

<?php
while ($row=mysqli_fetch_array($in)) {
echo "<tbody><tr id='{$row['id']}' class='border_bottom'>";
echo "<td id='delete' style='width:; text-align: center;'>
<a style='color:red;' class='remove' name='' id='{$row['sender_email']}'><i class='fa fa-trash'></i></a>
</td>";
$user_name=$row['sender_email'];
$subject = $row['subject'];
$getUsercount = mysqli_query($config,"select * from messages where sender_email = '$user_name' and receiver_email = '$you' and is_receiver_deleted = 0 and has_read = 0");
?>
<?php
if ($getUsercount->num_rows>0) {
$countgetuser = "<span class='numbering'>(".$getUsercount->num_rows.")</span> ";
}
else{
$countgetuser="";
 }

?>

<td id='from' style='width: ; text-align: center;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>'><?php echo substr($row['sender_email'],0,4);?></a><br></td>

<?php

 if ($row['has_read']==0) {
 ?>   
   <td id='message' style='text-align: center;font-weight:bold;font-size:14px;'><a style='text-align: center;font-weight:bold;font-size:13px;'  href='chat.php?user_name=<?php echo urlencode($user_name);?>' id='reply' onclick='' id='' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>
 <?php
 echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
 }
else {
?>
<td id='message' style='text-align: center;text-transform: capitalize;font-weight:normal;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>' style='font-size:13px;' onclick='' id='reply' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>
<?php
echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
}

}

?>
</tr></tbody>
</table>
 </div>
<?php 
if ($page_number>1) {
    echo '<a href = "messages.php?page=' . ($page_number-1) . '"> Prev </a>';  
}
for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
if ($page_number==$total_pages) {
echo '<a class="active"  href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
}
else{
echo '<a href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
}
}  
if ($page_number<$total_pages) {
  $next = '<a  href = "messages.php?page=' . ($page_number+1) . '"> Next</a>';  
print_r($next);
}

?>

  </div>

</div>

 </div>

 </div>

<script>
$(document).ready(function(){
$('.remove').click(function(){
if(confirm("Are you sure you want to delete this?")) {
let id = $(this).attr('id');
let rowElement =$(this).parent().parent();
$.ajax({
url:'engine/remove-received.php',
method:'POST',
data:{'id':id},
success:function(response)
     {
     if (response==1) {
       swal({       
         text:"Message has been deleted",
         icon:"success",
       });
       rowElement.fadeOut('slow').remove();
} 
else{
swal({icon:"error",
  text:response
});
}
     }
     
    });
   }
   });
 
});
</script>


<script>
$(document).ready(function(){
 $('.removeSent').click(function(){
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = $(this).attr('id');
var rowElement =$(this).parent().parent();
$.ajax({
     url:'engine/remove-sent.php',
     method:'POST',
     data:{id:id},
     success:function(response)
     {     
      if (response==1) {
       swal({        
         text:"Message has been deleted",
         icon:"success",
       });
       rowElement.fadeOut('slow').remove();
} 
else{
swal(response);
}
     }
     
    });
   }
 });
 
});

</script>
     
</body>
</html>
