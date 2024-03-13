<?php
include('header.php');
include('./includes/function.php');

if(isset($_POST['addtowishlist'])){
   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['price'];
   $product_image = $_POST['product_image'];

   $check_wishlist_numbers = mysqli_query($con, "select * from wishlist where pid='$product_id' and user_id='$user_id'") or die("query fialed");
   if(mysqli_num_rows($check_wishlist_numbers)>0){
      ?>
       <!-- <script>
        alert("already added to wishlist");
        </script> -->
      <?php
     
   }else{
    $sql= "insert into wishlist(user_id,pid,name,price,image)values('$user_id','$product_id','$product_name','$product_price','$product_image')";
    mysqli_query($con,$sql);
    
    ?>
       <!-- <script>
        alert("added wishlist Succesfullly");
        </script> -->
      <?php
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | Online Fashion Store | Men | Women | Kids</title>
<style>
  button{
        border:0;
        background-color:none;
      }
  </style>
</head>
<body>
<!--Hero Section Starts-->
<div class="hero">
            <div class="hero-img"><img src="./images/hero-section/banner.jpg" width="100%"></div>
            
        <div class="text">
        <p>Limited Time Only For Winter</p>
        <h1>FASHION</h1>
        <h5>Look Your Best On Your Best Day</h5>
        <span><a href="#">Shop Now <img src="./images/cat/right-arrow.png" class="arrow"></a></span>
        </div>
        </div>
    <!--Hero Section Starts-->

    <!-- ==== our story section starts ==== -->
      <div class="story">
             <img src="./images/nav-logo/our-story.webp" alt="our story" width="260px">
            <!-- <h3>OUR STORY</h3><br> -->
            <p>Clothing was born out of our frustration <br>
            to find everyday clothing that was high quality, <br>
            comfortable and didn’t harm the planet.</p>
      </div>
    <!-- ==== our story section ends ==== -->

    <!-- === category Section Starts === -->
      <div class="category">
        <ul>
            <li><a href="category.php?cat_id=1"><img src="./images/cat/men3.webp" alt="Men's Fashion" class="men"><p>Men's Fashion <img src="./images/cat/right-arrow.png" class="arrow"></p></a></li>
            <li><a href="category.php?cat_id=3"><img src="./images/cat/women.webp" alt="Women's Fashion"><p>Women's Fashion <img src="./images/cat/right-arrow.png"class="arrow"></p></a></li>
            <li><a href="category.php?cat_id=4"><img src="./images/cat/kid.webp" alt="Kid's Fashion"><p>Kid's Fashion <img src="./images/cat/right-arrow.png"class="arrow"></p></a></li>
        </ul>
      </div>
    <!-- === category Section Ends === -->

    <!-- === features section starts === -->
    <div class="features">
     <ul>
        <li><img src="./images/policy/Free_shipping.svg" alt="free-shipping"><br><br><p>Free Shipping</p></li>
        <li><img src="./images/policy/quality-ico.webp" alt="Premium Quality"><br><br><p>Premium Quality</p></li>
        <li><img src="./images/policy/COD.svg" alt="COD"><br><br><p>COD Available</p></li>
        <li><img src="./images/policy/safe-ico.webp" alt="safe payment"><br><br><p>Safe & Secure Payment</p></li>
     </ul>
    </div>

    <!-- === features section ends === -->

    <!-- === New Arrival Section Starts === -->
    <p class="main-title">New Arrivals</p>
    <div class="grid-container">
    <?php
    $get_product=get_product($con,8);
    // prx($get_product);
    foreach($get_product as $list){
    ?>
      <form method="POST">
      <div class="grid-item">
        <div class="card">
            <a href="product.php?pro_id=<?php echo $list['pro_id'] ?>">
            <div class="con">
            <img src="./media/product/<?php echo $list['image'] ?>" alt="<?php echo $list['image'] ?>" width="250px">
            <div class="top-right">
              <button type="submit" name="addtowishlist">
              <img src="./images/nav-logo/favourite.png" width="24px" title="Add To Wishlist">
             </button>
            </div></div>
            <div class="card-text">
                <p><?php echo $list['pname'] ?></p>
                <p class="price">Rs. <?php echo $list['sprice'] ?></p>
            </div>
            </a>
        </div>
      </div>
    
      <input type="hidden" name="product_id" value="<?php echo $list['pro_id']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $list['pname']; ?>">
      <input type="hidden" name="price" value="<?php echo $list['sprice']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $list['image']; ?>">
      <input type="hidden" name="product_quantity" value="<?php echo $list['qty']; ?>">
    </form>
      <?php } ?>
    </div>
    
     <!-- === New Arrival Section ends === -->

   <?php 
    include ("footer.php");
    ?> 