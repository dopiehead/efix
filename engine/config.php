<?php 
$conn = mysqli_connect("localhost", "root","","e_fix");
if(!$conn){
    echo "Error connecting to database ".mysqli_error($conn);
}
?>