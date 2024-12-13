<div class='header text-white fw-bold'>

     <ul class='d-flex reg mb-4 mt-4 list-style-none'>

          

         <li><a class='text-white' href='login.php' >Login</a></li>

         <li><span class='pl-1 border-left border-2 border-secondary'><a class='text-white' href='join-us.php'>Sign up</a></span></li>
        
     </ul>

</div>




<div class='d-flex section_links text-white fw-bold '>

      <div class='nav-bar'>

          <div>
            
             logo


          </div>


         <div class='openbtn-container'>
       
         <div class="menu-icon text-white">
               <div class="bar bar1"></div>
               <div class="bar bar2"></div>
               <div class="bar bar3"></div>

         </div>

         </div>

       </div>

         <div class='section-provider'>


               <li><a class='text-decoration-none' href='service-providers.php'>Service providers</a></li>

                <li><a class='text-decoration-none' href='charges.php'>Call out charges</a></li>

               <li ><a class='text-decoration-none' href='https://estores.ng/login.php?details=postadvert.php'>Sell a product</a></li>  


         </div>


    


         <div class='d-flex section-profile g-4 list-unstyled'>

         <li class='text-white'><a class='text-decoration-none text-white' href='login.php?details=profile.php'><i class='fa fa-user-alt'></i></a></li>

         <li class='text-white'><a class='text-decoration-none text-white' href='cart.php'><i class='fa fa-shopping-cart'></i></a></li>


         </div>



</div>




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