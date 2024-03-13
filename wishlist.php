<?php
include('header.php');
include('./includes/function.php');

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($con,"delete from wishlist where wishlist_id='$delete_id'");
}

if(isset($_POST['addtocart'])){
    // $cart_id = $_GET['cart'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['product_image'];
    $product_quantity=1;
    $check_cart_numbers= mysqli_query($con,"select * from cart where pid='$product_id' and user_id=$user_id") or die('query failed');
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
    <title>WISHLIST</title>
    <style>
        
         table{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
            border-collapse:collapse;
            width:50%;
            margin:20px 340px;
            box-shadow: 0 10px 30px rgba(0,0,0, 0.9);
        }
 table th,td{
    padding: 8px;
    text-align:center;
    border-bottom:1px solid #ddd;
}
table tr:nth-child(even){
    background-color:white;
}
th{
    background-color:#04AA6D;
    color:white;
}
.view{
    border:1px solid black;
    background-color:white;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
    text-decoration:none;
    color:black;
}
.view:hover{
    background-color:lightyellow;
}
button{
    border:1px solid black;
    background-color:lightskyblue;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
}
button:hover{
    background-color:white;
}
.del{
    background-color:lightskyblue;
    color:black;
}
        </style>
</head>
<body>
<p class="main-title">Your Wishlist</p>

        
    <?php
    $select = "select * from wishlist where user_id=$user_id";
    $query = mysqli_query($con,$select);
     $row = mysqli_num_rows($query);
     if($row>0){
        $i=1;
        ?>
        <form method="POST">
        <table>
        <tr>
            <th>Sr.No</th>
            <th>Image</th>
            <th>PRICE</th>
            <th>OPERATION</th>
        </tr>
        <?php
        while($fetch = mysqli_fetch_assoc($query)){
            ?>
        <tr>
           <td><?php echo $i?></td>
           <td>
            <a href="product.php?pro_id=<?php echo $fetch['pid'];?>">
            <img src="./media/product/<?php echo $fetch['image'];?>" height="150px" class="small-img" alt="">
            </a><br><br> 
           <?php echo $fetch['name']; ?></td>
            <td><?php echo $fetch['price']; ?></td>
            <input type="hidden" name="product_id" value="<?php  echo $fetch['pid'];?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $fetch['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch['image'] ; ?>">

            <td><a href="?delete=<?php echo $fetch['wishlist_id'];?>" onclick="return confirm('Are You Sure You Want To delete from wishlist');" class="view">REMOVE</a> &nbsp; &nbsp;
            <!-- <button type="submit" name="addtocart">ADD TO CART</button></td>  -->
        <tr>
    
    <?php
         $i++; }
         ?>
         <?php
         ?>
         </form>
    </table>
         <?php
     }else{
        echo '<p class="main-title">Your Wishlist Is Empty</p>';
     }

    ?>



    <?php 
    include ("footer.php");
    ?>
</body>
</html>

