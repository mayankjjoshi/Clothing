<?php
include('header.php');
include('./includes/function.php');
$sub_categories='';
if(isset($_GET['sub_categories'])){
  $sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}

if(isset($_POST['adddtowishlist'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['product_image'];
 
    $check_wishlist_numbers = mysqli_query($con, "select * from wishlist where pid='$product_id' and user_id='$user_id'") or die("query fialed");
    if(mysqli_num_rows($check_wishlist_numbers)>0){
       ?>
        <script>
         alert("already added to wishlist");
         </script>
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



$cat_id = $_GET['cat_id'];
// $get_product=get_product($con,'',$cat_id);
$get_product=get_product($con,'',$cat_id,'',$sub_categories);
$sql="select * from category where cat_id='$cat_id'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($res)){
    $category_name=$row['cat_name'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY | Online Fashion Store | Men | Women | Kids</title>
    <style>
      button{
        border:0;
        background-color:none;
      }
      </style>
</head>
<body>
    

 <p class="main-title"><?php echo $category_name ?></p>
<div class="grid-container">
 <?php if(count($get_product)>0){?>
 <?php
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
               <button type="submit" name="adddtowishlist">
              <img src="./images/nav-logo/favourite.png" width="24px" title="Add To Wishlist">
             </button>
               </div>
            </div>
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

</body>
</html>