<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Registration Page</title>
</head>
<body>
     <div>
         <div class='bg-login'>

         <div style='margin-top:-20px;cursor:pointer;' class='position-absolute px-4 d-flex flex-row flex-column'>

               <a href='index.php' class='text-white logo mt-5'>LOGO</a>

               <a onclick='history.go(-1)' class='fw-bold text-white mt-4' ><i class='fa fa-chevron-left'></i></a>
         </div>


         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1a3547" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,282.7C960,256,1056,192,1152,170.7C1248,149,1344,171,1392,181.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
          
         <div class='container form-container d-flex flex-row flex-column g-5'>

            <h2 class='fw-bold'>Register</h2>


            <!-- form -->

            <form id='sp-form'>
            
            <div class='first-form'>

            <label for="name"  class='fw-bold'> Name</label>

            <input  type="text" name='sp_name' class='sp_name' placeholder='Enter Name'>

            <label for="email" class='fw-bold'>EMAIL ADDRESS</label>
         
            <input  type="email" name='sp_email' placeholder='Enter email address'>

            <label for="password"  class='fw-bold'>PASSWORD</label>

            <input type="password" name='sp_password'  placeholder='Enter password'>

            <label for="password"  class='fw-bold'>CONFIRM PASSWORD</label>

            <input type="password" name='confirm_password'  placeholder='Confirm password'>

            <label for="category" class='fw-bold'>SELECT CATEGORY</label>
    
          <select name="sp_category" class="category mb-3 text-secondary">
              <option value="">Service category</option>
               <option value="information technology">Information technology</option>
               <option value="mechanic">Mechanic</option>
               <option value="vulganizer">Vulganizer</option>
               <option value="teaching">Teaching</option>
              <option value="plumbing services">Plumbing services</option>
              <option value="electrical/inverter services">Electrical / Inverter services</option>
              <option value="cleaning/laundy/fumigation">Cleaning / Laundry / Fumigation</option>
              <option value="carpentry services">Carpentry Services</option>
               <option value="appliances electronics">Appliances Electronics</option>
              <option value="Ac/refrigeration services">AC /Refrigeration Services</option>
         </select>
          
         <div style='margin-top:-30px;'>

         </div>
               
           <label for="speciality" class='fw-bold'>SPECIALITY</label>

           <span class="text-capitalize speciality"></span>

           </div>

<!-- second form -->

<div class='hide'>

         <label for="experience" class='fw-bold'>EXPERIENCE</label>

           <input type="text"  placeholder="Experience (years)"  name="sp_experience">        

           <label for="bio" class='fw-bold'>BIO</label>

           <textarea  class="form-control"  placeholder="Bio"  name="sp_bio"></textarea>

           <label for="phonenumber" class='fw-bold'>PHONE NUMBER</label>

           <input type="number"  min="1" minlength="12" placeholder="Phone number"  name="sp_phonenumber1">

           <label for="phonenumber" class='fw-bold'>PHONE NUMBER</label>
          
           <input type="number" min="1" minlength="12"  placeholder="Phone number(Optional)"  name="sp_phonenumber">

           <label for="location" class='fw-bold'>LOCATION</label>
         
           <input type="text" min="1" minlength="12"  placeholder="Location"  name="sp_location">

           <input type="hidden" value="0" name="sp_ratings">

           <input type="hidden" value="0" name="verified">

           <input type="hidden" value="0" name="e_verify">

           <input type="hidden" value="0" name="bank_name">

           <input type="hidden" value="0" name="account_number">

           <input type="hidden" value="0" name="pay">

            <div class="text-right">

                    <span><a class='text-secondary' href='login.php'>Already a member? <span class='text-decoration-underline'>Login</span></a></span>

            </div>

            <div>

                   <button id='btn-register' class='btn btn-secondary'>Register</button>

                   <?php include 'components/loader.php'; ?>
                  
            </div>

            </div>

            </form>

            <button class='btn btn-default btn-secondary px-3 py-2 mt-2 border-2 border-secondary text-white text-capitalize rounded'>Continue</button>
            
            <button onclick='back()' class='btn btn-back btn-info'><i class='fa fa-arrow-left'></i> Go back</button>
         </div>

     </div>

<br><br>
     <?php include 'components/footer.php';?>
 </div>
 <script type="text/javascript">
  $(".btn-back").hide();
  $('.btn-default').on('click',function() {
$('.first-form').slideUp();
$('.hide').css("display","flex");
$('.hide').slideDown().show();
$('.btn-default').hide();
$(".btn-back").show();

});
  
function back() {
$(".btn-back").show();
$('.first-form').slideDown().show();
$('.first-form').css("display","flex");
$('.hide').slideUp().hide();
$(".btn-back").hide();
$('.btn-default').show();
}
</script>



<script>

$("#btn-register").click(function(e){
    e.preventDefault();
    $("loading-image").show();
    let formData = $("#sp-form").serialize();
    //  alert(formData);
 // Get the form data
    $.ajax({
        url: 'engine/int-register-process.php', // point to server-side PHP script
        data: formData,
        type: 'POST',
        // data: JSON.stringify(formData), // Send the data as a JSON string
        // contentType: 'application/json',
        success: function(response){
            $(".loading-image").hide();
            if(response=='1'){
                swal({

                     title: "Registration Successful",
                      text: "You have successfully registered. Please check your email for verification.",
                       icon: "success",
                      button: "Okay",
                      timer: 3000
                });

                $("#sp-form")[0].reset();
                $('input,select').css('border-color','darkgrey');
            }

            else{
           
                swal({

                      title: "Notice",
                      text:response,
                      icon: "warning",
                      button: "Okay",
                    //   timer: 3000
                      });

                      $('#btn-register').prop('disabled', false);
                      $('input,select').css('border-color','red');

            }
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });


});


</script>


<script type="text/javascript">
$(document).ready(function() {
    // Initialize the speciality dropdown
    $('.speciality').html('<select name="sp_speciality"><option value="">Select Category</option></select>');
    
    // Define category to speciality mapping
    const specialityOptions = {
        'information technology': [
            { value: 'web developer', text: 'Web Developer' },
            { value: 'UI UX designer', text: 'UI/UX Designer' },
            { value: 'Graphics designer', text: 'Graphics Designer' }
        ],
        'mechanic': [
            { value: 'motorcycles', text: 'Motorcycles' },
            { value: 'trucks', text: 'Trucks' },
            { value: 'vehicles', text: 'Vehicles' },
            { value: 'buses', text: 'Buses' }
        ],
        'vulganizer': [
            { value: 'truck', text: 'Trucks' },
            { value: 'buses', text: 'Buses' },
            { value: 'motorcycles', text: 'Motorcycles' },
            { value: 'vehicles', text: 'Vehicles' }
        ],
        'teaching': [
            { value: 'primary schools', text: 'Primary Schools' },
            { value: 'secondary schools', text: 'Secondary Schools' },
            { value: 'tertiary institutions', text: 'Tertiary Institutions' }
        ],
        'household': [
            { value: 'plumber', text: 'Plumber' },
            { value: 'bricklayer', text: 'Bricklayer' },
            { value: 'painter', text: 'Painter' },
            { value: 'gardener', text: 'Gardener' }
        ],
        'electrical/inverter services': [
            { value: 'electrical installations', text: 'Electrical Installations' },
            { value: 'electrical repairs', text: 'Electrical Repairs' },
            { value: 'fixtures/fittings/outlets', text: 'Fixtures/Fittings/Outlets' },
            { value: 'inverter repair/installation', text: 'Inverter Repair/Installation' },
            { value: 'prepaid meter install', text: 'Prepaid Meter Install' }
        ],
        'plumbing services': [
            { value: 'plumbing repair/install', text: 'Plumbing Repair/Install' },
            { value: 'drain/leaks fixing', text: 'Drain/Leaks Fixing' },
            { value: 'pumping machine', text: 'Pumping Machine' },
            { value: 'toilet repairs', text: 'Toilet Repairs' },
            { value: 'water treatment/tank washing', text: 'Water Treatment/Tank Washing' }
        ],
        'Ac/refrigeration services': [
            { value: 'ac gas filling', text: 'AC Gas Filling' },
            { value: 'ac repair and installations', text: 'AC Repair and Installations' },
            { value: 'refrigerator repair', text: 'Refrigerator Repair' },
            { value: 'freezer repair', text: 'Freezer Repair' },
            { value: 'water dispenser', text: 'Water Dispenser' },
            { value: 'cold room servicing', text: 'Cold Room Servicing' }
        ],
        'appliances electronics': [
            { value: 'washing machine', text: 'Washing Machine' },
            { value: 'blender', text: 'Blender' },
            { value: 'exercise equipment', text: 'Exercise Equipment' },
            { value: 'gas/electric cooker', text: 'Gas/Electric Cooker' },
            { value: 'microwave', text: 'Microwave' },
            { value: 'tv-installation/mounting/repair', text: 'TV Installation/Mounting/Repair' },
            { value: 'fan', text: 'Fan' },
            { value: 'home theater', text: 'Home Theater' }
        ],
        'cleaning/laundy/fumigation': [
            { value: 'indoor cleaning', text: 'Indoor Cleaning' },
            { value: 'outdoor cleaning', text: 'Outdoor Cleaning' },
            { value: 'fumigation', text: 'Fumigation' },
            { value: 'laundry service', text: 'Laundry Service' }
        ],
        'carpentry services': [
            { value: 'windows and doors', text: 'Windows and Doors' },
            { value: 'cabinetry', text: 'Cabinetry' },
            { value: 'furniture', text: 'Furniture' },
            { value: 'roofing', text: 'Roofing' }
        ]
    };

    // Handle category change event
    $('.category').on('change', function() {
        const category = $(this).val();
        let optionsHtml = '<option value="">Select Speciality</option>';

        if (specialityOptions[category]) {
            specialityOptions[category].forEach(option => {
                optionsHtml += `<option value="${option.value}">${option.text}</option>`;
            });
        }

        $('.speciality').html(`<select class="text-capitalize" name="sp_speciality">${optionsHtml}</select>`);
    });
});
</script>




</body>
</html>