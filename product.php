<?php
include('header.php');
include('./includes/function.php');
$pro_id = $_GET['pro_id'];
$get_product=get_product($con,'','',$pro_id);

if(isset($_POST['addtowishlist'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['product_image'];
 
    $check_wishlist_numbers = mysqli_query($con, "select * from wishlist where pid='$pro_id' and user_id='$user_id'") or die("query failed");
    if(mysqli_num_rows($check_wishlist_numbers)>0){
       ?>
        <script>
         alert("already added to wishlist");
         </script> 
       <?php
      
    }else{
     $sql= "insert into wishlist(user_id,pid,name,price,image)values('$user_id','$pro_id','$product_name','$product_price','$product_image')";
     mysqli_query($con,$sql);
     
     ?>
        <!-- <script>
         alert("added wishlist Succesfullly");
         </script> -->
       <?php
    }
 }

if(isset($_POST['addtocart'])){
    // $cart_id = $_GET['cart'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['product_image'];
    $product_quantity=$_POST['qty'];
    $check_cart_numbers= mysqli_query($con,"select * from cart where pid='$pro_id' and user_id=$user_id") or die('query failed');
    if(mysqli_num_rows($check_cart_numbers)>0){
        ?>
        <script>
            alert('already added');
            </script> 
        <?php
    }else{
        // $check_wishlist_numbers= mysqli_query($con,"select * from wishlist where pid='$product_id' and user_id='$user_id'") or die('query failed');

        // if(mysqli_num_rows($check_wishlist_numbers)>0){
        //     mysqli_query($con,"delete from wishlist where pid='$product_id' and user_id='$user_id'") or die('query failed');
        // }
        
        mysqli_query($con,"insert into cart(user_id,pid,name,price,quantity,image)values('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')") or die('query failed');
    ?>
    <!-- <script>
        confirm('added succesfully');
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
    <title>PRODUCT | Online Fashion Store | Men | Women | Kids</title>

</head>
<body>
   
 <p class="main-title"></p>
 <?php if(count($get_product)>0){?>
 <?php
    // prx($get_product);
    foreach($get_product as $list){
    ?>
      <form method="post">
<section id="prodetails">
      <div class="single-pro-image">
          <img src="./media/product/<?php echo $list['image'] ?>" alt="<?php echo $list['image'] ?>" width="100%" id="MainImg" alt="">
          <div class="small-img-group">
            <div class="small-img-col">
                <img src="./media/product/<?php echo $list['image'] ?>"width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="./media/product/<?php echo $list['image2'] ?>" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="./media/product/<?php echo $list['image3'] ?>" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="./media/product/<?php echo $list['image4'] ?>"width="100%" class="small-img" alt="">
            </div>
          </div>
      </div>
      <div class="single-pro-details">
        <h6>Home/<?php echo $list['pname'] ?></</h6>
        <h4><?php echo $list['pname'] ?></h4>
        <h4><?php echo $list['short_desc'] ?></h4>
        <h2>Rs.<?php echo $list['sprice'] ?></h2><br>
        <select>
            <option>Select Size</option>
            <option>XL</option>
            <option>XXL</option>
            <option>Small</option>
            <option>Large</option>
        </select>
        <input type="number" value="1" min="1" max="<?php echo $list['qty']?>" name="qty">

        <h4>Product Details</h4>
        <span><?php echo $list['description'] ?>
        </span>
        <br>
      

        <input type="hidden" name="product_id" value="<?php echo $list['pro_id'];?>">
      <input type="hidden" name="product_name" value="<?php echo $list['pname']; ?>">
      <input type="hidden" name="price" value="<?php echo $list['sprice']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $list['image'];?>">
     
        <button type="submit" name="addtocart">ADD TO CART</button>
        <button type="submit" name="addtowishlist" class="wishlist">ADD TO WISHLIST</button>
      </div>
   
</section>
</form>
        <?php } ?>
    
  <?php } else {
    ?>
    <p class="main-title">Data Not Found</p>
    <?php
    }?>
</div>

<?php 
    include ("footer.php");
?>
<script>
        var MainImg = document.getElementById("MainImg");
var smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = function () {
	MainImg.src = smallimg[0].src;
}
smallimg[1].onclick = function () {
	MainImg.src = smallimg[1].src;
}
smallimg[2].onclick = function () {
	MainImg.src = smallimg[2].src;
}
smallimg[3].onclick = function () {
	MainImg.src = smallimg[3].src;
}
    </script>
