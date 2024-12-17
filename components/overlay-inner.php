
<link rel="stylesheet" href="../assets/css/overlay-inner.css" >

<div class="button_nav">
    
    <div class="nav_btn"> 

         <div class="menu-icon">
        
               <div class="bar bar1"></div>
               <div class="bar bar2"></div>
               <div class="bar bar3"></div>

         </div> 

         <div class='logo-container'>

           <a href='index.php'><img src ='assets/img/logo.png'></a>

         </div>


     </div>

     <div class="search_container">

      <input type="search" placeholder="Search for service providers" class='rounded rounded-pill px-1'>
      <button class="btn rounded btn-secondary rounded-pill">Search</button>



     </div>


     <div class="user_nav">

         <div class='nav_icons'>

             <a href='dashboard/liked-item.php' class='text-dark'><i class='fa fa-heart'></i></a>
             
             <a href='dashboard/profile.php' class='text-dark'><i class='fa fa-user-alt'></i></a>

             <!-- <a href='cart.php' class='text-dark'><i class='fa fa-shopping-cart'></i></a> -->


         </div>

            


         <div class='log-icons'>
               
               <?php if(isset($_SESSION['id']) || isset($_SESSION['sp_id'])){ ?>

               <a class='text-dark' href="profile.php">Profile</a>

               <?php }  else { ?>

              <a class='text-dark' href="login.php">Login</a>

              <a class="text-dark border-left border-2 border-primary pl-2" href="join-us.php">Register</a>

               <?php } ?>

         </div>




     </div>



</div>

<div>

<a class="text-dark fw-bold mx-3" onclick="window.history.back();">
    <i class="fa fa-chevron-left fa-1x"></i>
</a>
</div>



<!-- mobile mode -->




<div id="myform" class="overlay overlayParent">

<div class="overlay-content">

<a href='service_providers.php' class='text-white'>Service providers</a>

<a class='text-white' href='charges.php'>Call out charges</a>

<a class='text-white' href='profile.php'>Sell a product</a>  
  
</div>
</div>






<script>

         $(".menu-icon").click(function(){

              $(this).toggleClass("close");

         $("#myform").toggleClass("overlayParent");

         });

</script>
