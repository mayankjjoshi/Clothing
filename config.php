<?php
session_start();
$con = mysqli_connect("localhost","root","","fashion1");
if(!$con){
    echo "Connection Failed " . " ". mysqli_connect_error();
}
?>