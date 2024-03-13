<?php
require('./includes/connection.php');
if(isset( $_SESSION['ADMIN_LOGIN']) &&  $_SESSION['ADMIN_LOGIN']!=''){

}else{
    header('location:login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- === sidenav section starts === -->
    <div class="sidenav">
        <h4 class="logo">ADMIN PANEL</h4>
     <a href="home.php">HOME</a> 
        <a href="users.php">USER</a>
        <a href="category.php">CATEGORY</a>
        <!-- <a href="manage_category.php">ADD CATEGORY</a> -->
        <a href="product.php">PRODUCTS</a>
        <a href="subcategory.php">SUB CATEGORY</a>
        <a href="adorder.php">ORDERS</a>
        <!-- <a href="manage_product.php">ADD PRODUCTS</a> -->
        <a href="contact_us.php">CONTACT US</a> 
        <a href="logout.php">LOGOUT</a>
    </div>
    <!-- === sidenav section ends === -->

</body>
</html>