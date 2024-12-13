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
    <link rel="stylesheet" href="../dashboard/css/profile.css">
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
                         <h4 class='fw-bold'>Profile</h4>
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
<div id="messages_home" style="text-align: center;">
<div class="tab">
<a class="tablinks btn btn-primary"  id="defaultOpen" onclick="openCity(event,'London')">My profile</a>
<a class="tablinks btn btn-trash" onclick="openCity(event,'Paris')">Edit Profile</a>

</div>

</div>



<br>


<div id="London" class="tabcontent">

      <table style="width: 100%;">
            <thead>
                 <tr style="border-top: 2px solid rgba(192,192,192,0.4);border-bottom: 2px solid rgba(192,192,192,0.4);">
                      <td style="padding:10px;" class="inbox" id="Home">Personal details</td>
                 </tr>
           </thead>
      </table>


 <small>Neeyo</small><br>


<small></small><br>
<small>Dial code +234</small><br>


<small> 0908754324</small><br>
<small> 0908765453</small><br>

<small>Dial code +234</small><br>

   <br>
  <span class='mb-3'>
   <i class="fa-solid fa-user-alt"></i>
   </span>  
   <br>

<form class='mt-3' id="editpage-form" method="post">

<input type="hidden" name="id">
<input type="file" name="fileupload"><br><br>
<input type="submit" name="submit" id="submit" value="Change photo" class="btn btn-success " style="color: white;"><br>

</form>


</div>


<div id="Paris" class="tabcontent">

<h6>My profile</h6>

<form id="editpage-details">

<input type="text" id="first_name" name="first_name" placeholder="Full Name"><br>

<input type="hidden"  name="sid" value="">
<input type="hidden"  name="user_type" value="">

<input id="business_name" name="business_name" type="text" class="form-control" placeholder="Business Name"><br>



<input id="first_name"  type="password" name="password" placeholder="Password"><input id="first_name"  type="password" name="cpassword" placeholder="Confirm Password"><br>

<h6>Contact information</h6>

<input type="text" name="country" placeholder="Country" id="contact"><input type="text" name="contact" id="contact"  placeholder="Phone number">

<input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp"><br>

<input id="business_email" type="email" style="font-size:14px !important" name="" class="form-control" value="" placeholder="Email Address"><br>

<h6> Address Details</h6><br>

<select name="location" class=" location address_details" id="location">
<option value="">Entire Nigeria</option>

</select>

<span id='lg'></span>

<h6> About Your Organisation</h6><br>

<textarea class="form-control" name="about" placeholder="About Your Organization" wrap="physical"></textarea><br>

<textarea class="form-control" name="services" placeholder="Services Your Organization Provides, ...." wrap="physical"></textarea><br>

<select name="business_category" id="business_category" class="form-control" style="text-transform: capitalize;">


</select><br>

<h6>Availability</h6><br>

<select name="days" id="time">

<option value="days">Days</option>
<option value="monday">Monday</option>
<option value="tuesday">Tuesday</option>
<option value="wednesday">Wednesday</option>
<option value="thursday">Thursday</option>
<option value="friday">Friday</option>
<option value="saturday">Saturday</option>
<option value="sunday">Sunday</option>

</select>   

<input id="time" type="text" name="opening_time" placeholder="Opening Time in :am/:pm">  <input id="time" type="text" name="closing_time" placeholder="Closing Time in :am/:pm"><br>



<h6>Social Media</h6><br>

<input id="links" type="text" name="facebook" placeholder="Facebook">
<input id="links" type="text" name="twitter" placeholder="Twitter">
<input id="links" type="text" name="linkedin" placeholder="Linkedin ">
<input id="links" type="text" name="instagram" placeholder="Instagram">

<div style="text-align: right;">
<a class="btn btn-danger" onclick="cancel()">Cancel</a><a id="btn-submit" class="btn btn-success">Submit</a>


</div>

</form>

</div>

         </div>


<script>

function openCity(evt, cityName) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
 }
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
 tablinks[i].className = tablinks[i].className.replace(" active", "");
 }
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>




 <script>

$('#lg').html("<select  id='lga' class=' lga address_details'><option>Business Axis</option></select>");
$('.location').on('change',function() {
var location = $(this).val();

      $.ajax({
             type:"POST",
             url:"engine/get-lga.php",
             data:{'location':location},
             success:function(data) {
              $('#lg').html(data);              
         }
     });
});

</script>
     
</body>
</html>
