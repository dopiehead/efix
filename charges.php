<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/links.php'; ?>
   
    <link rel="stylesheet" href="assets/css/charges.css">
    <link rel="stylesheet" href="assets/css/overlay-inner.css">
    <title>Charges</title>
</head>
<body>
        <?php include 'components/overlay-inner.php';?>

        <br><br>

        <span class='text-primary text-sm rounded rounded-pill border-primary border border-2 px-3 py-1 bg-mute my-5 mx-3'>Call out / Labour charge</span>

         <div class='container'>

             <h2 class='bg-light text-sm text-center my-5 py-3'><span class='notice'>Notice:</span> Please note that a call-out fee must be paid before a service provider is dispatched.</h2>

             <div class='text-center shadow border-0 p-3'>

                 <h5 class='fw-bold mb-4'>Electricity</h5>
           
             <table class=" table-striped table-hoverable full-width w-100">
    <thead>
        <tr class='text-center'>
            <th class="text-secondary">Description</th>
            <th class="text-secondary">Call out charge</th>
            <th class="text-secondary">Labour charge</th>
        </tr>
    </thead>
    <tbody>
        <tr class='text-center'>
            <td>Fixing</td>
            <td><i class="fa fa-naira-sign"></i> 3000</td>
            <td><i class="fa fa-naira-sign"></i> 6000 - <i class="fa fa-naira-sign"></i> 9000</td>
        </tr>
    </tbody>
</table>


             </div>

         </div>

               <!------------------------------------------btn-scroll--------------------------------------------------->

       <a class=" btn-down" onclick="topFunction()">&#8593;</a>

       
         <br><br>

         <?php include 'components/footer.php';?>
    
</body>
</html>