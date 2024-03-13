<?php
require('./includes/config.php');
$user_id='';
if(isset($_SESSION['USER_LOGIN']) &&  $_SESSION['USER_LOGIN']!=''){
    $user_id = $_SESSION['USERID'];
    // echo $user_id;
}else{
    header('location:login.php');
    die();
}

$cat_res=mysqli_query($con,"select * from category where status=1 order by cat_name asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Online Fashion Store | Men | Women | Kids</title> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Header section starts-->
    <header>
        <!-- <h2 class="logo"><img src="./images/nav-logo/download-logo.webp" width="90px"></h2> -->
        <img src="./images/nav-logo/download-logo.webp" width="90px">
        <ul class="navbar">
            <li><a href="home.php">HOME</a></li>
            <?php
            foreach($cat_arr as $list){
                ?>
                <li>
                    <div class="dropdown">
                      <a href="category.php?cat_id=<?php echo $list['cat_id']?>"><?php echo $list['cat_name']?></a> 
                      <div class="menu">
                        <?php
                            $catid= $list['cat_id'];
                           $subcat_res=mysqli_query($con,"select * from sub_category where cat_id='$catid' and status=1 order by subcategory asc");
                           $subcat_arr=array();
                           while($row=mysqli_fetch_assoc($subcat_res)){
                               $subcat_arr[]=$row;
                           }
                           foreach($subcat_arr as $list1){
                        ?>
                      <a href="category.php?cat_id=<?php echo $list['cat_id']?>&sub_categories=<?php echo $list1['subcategory_id']?>"><?php echo $list1['subcategory']?></a>
                      <?php  }  ?>
                            </div>
                           </div> 
                        <?php // }  ?>
                </li>
                <?php
            }

            ?>
            <!-- <li><a href="contact.php">CONTACT</a></li> -->
            <li>
                <div class="dropdown">
                <a><img src="./images/nav-logo/loupe.png"></a>
                 <div class="menu">
                    <form action="search.php" method="get">
                 <input type="text" name="search"  placeholder="Search Here .....">
                    </form>
                </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                <a><img src="./images/nav-logo/user.png"></a>
                 <div class="menu">
                 <a href="myaccount.php">My Account</a>
                 <a href="order.php">My Orders</a>
                 <a href="logout.php">Logout</a>
                </div>
                </div>
            </li>
            <li><a href="wishlist.php"><img src="./images/nav-logo/favourite.png"></a></li>
            <li><a href="cart.php"><img src="./images/nav-logo/shopping-cart.png"></a></li>
        </ul>
    </header>
    <!--Header section ends-->
    <script src="script.js"></script>