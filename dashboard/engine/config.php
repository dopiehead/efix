<?php 
$config = mysqli_connect("localhost", "root","","e_fix");
if(!$config){
    echo "Error connecting to database ".mysqli_error($config);
}




?>