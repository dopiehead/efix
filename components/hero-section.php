





<div class='hero-section'>

     <div class='hero-content mt-2 text-center'>
          
           <div class='position-relative'>

           <h2 class='animated-heading'>Welcome to E-Fix</h2>


           </div>
          

           <br><br><br><br>


           <div class='px-3 mt-5 py-2 '>

           <form method='POST' action='./search-process.php'>
            
           <input type="text" name="search" class='rounded rounded-pill border-0 ' >
        
  
           <button name ='submit' class='btn btn-primary btn-search text-white rounded rounded-pill fs-4 mr-2'><i class='fa fa-search'></i>Search</button>
            
           </form>

           </div>
     </div>




</div>

<script>
window.onload = function() {
    const heading = document.querySelector('.animated-heading');
    setTimeout(() => {
        heading.classList.add('animate'); // Trigger the margin animation
    }, 100); // Delay in milliseconds before starting the animation
};
</script>

