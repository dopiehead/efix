<div id='menu-part' class='menu-part bg-secondary text-white  p-3'>

            
            
<div class="list-unstyled g-5">
<li class='text-white'><a class='text-white text-decoration-none' href='../index.php'><i class="fas fa-home"></i> Home</a></li>
      
     <li class='text-white dashboard'><a class='text-white  text-decoration-none' href='dashboard.php'><i class="fas fa-th-large fa-1x"></i> Dashboard</a></li>
     <li class='text-white profile'><a class='text-white text-decoration-none' href='profile.php'><i class="fa fa-user-alt fa-1x"></i> Profile </a></li>
     <li class='text-white message'><a class='text-white  text-decoration-none' href='messages.php'><i class='fa fa-envelope fa-1x'></i> Messages</a></li>
     <li class='text-white services'><a class='text-white text-decoration-none '  href='services-provided.php'><i class='fa fa-dollar-sign fa-1x'></i> Services Provided</a></li>
     <li class='text-white work'><a class='text-white text-decoration-none' href='work-experience.php'><i class='fa fa-history fa-1x'></i> Work Experience</a></li>

</div>

<div class='list-unstyled g-5 mt-5'>

   <hr>

    <li><a href='logout.php' class='text-white text-decoration-none'><i class='fa fa-sign-out fa-1x'></i> Logout</a></li>

   

</div>


</div>



<script>
        $("#fa-bars").on("click", function(){         
         $(".menu-part").toggle();
        });
    </script>