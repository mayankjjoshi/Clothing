<?php
session_start();
$con = mysqli_connect("localhost","root","","fashion1");
if(!$con){
    echo "Not Connect To database :: " . mysqli_connect_error();
}
// else{
//     echo "Connection sucessfull";
// }
?>