<?php
include('header.php');
include('./includes/function.php');

if(isset($_GET['delete'])){
    $cart_id = $_GET['delete'];
    mysqli_query($con,"delete from cart where cart_id='$cart_id'");
}

if(isset($_POST['update'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity =$_POST['qty'];
    mysqli_query($con,"update cart set quantity='$cart_quantity' where cart_id='$cart_id'") or die('query failed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
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
button[type="submit"]{
        background-color: black;
        color: white;
        cursor: pointer;
        text-align: center;
        width: 400px;
        height: 34px;
        margin: 20px 470px;
        box-shadow: 0 10px 30px rgba(0,0,0, 0.9);
      }
     .disabled{
        opacity: 0.6;
        cursor: not-allowed;
     }
      input[type="number"]{
    width: 50px;
    height: 47px;
    padding-left: 10px;
    font-size: 16px;
    margin-right: 10px;
      }
        </style>
</head>
<body>
<p class="main-title">Your Cart</p>

        
    <?php
    $grand_total=0;
    $select = "select * from cart where user_id=$user_id";
    $query = mysqli_query($con,$select);
     $row = mysqli_num_rows($query);
     if($row>0){
        ?>
        <table>
        <tr>
            <th>Sr.No</th>
            <th>Image</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>SUB TOTAL</th>
            <th>OPERATION</th>
        </tr>
        <?php
        $i=1;
        
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
            <form method="POST">
            <td><input type="number" min="1" value="<?php echo $fetch['quantity']; ?>" name="qty"> <br><br>
        <input type="submit" value="Update" name="update"></td>
        <td><?php echo $subtotal= ($fetch['price'] * $fetch['quantity'])?></td>
            <input type="hidden" name="product_id" value="<?php  echo $fetch['pid'];?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch['name']; ?>">
      <input type="hidden" name="cart_id" value="<?php echo $fetch['cart_id']; ?>">
        </form>
      <input type="hidden" name="product_name" value="<?php echo $fetch['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $fetch['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch['image'] ; ?>">

            <td><a class="view" href="?delete=<?php echo $fetch['cart_id'];?>" onclick="return confirm('Are You Sure You Want To delete from cart');">REMOVE</a> &nbsp; &nbsp;
           
        </tr>
        <tr>
    
  
    <?php
     $grand_total += $subtotal;
         $i++; }
        
         ?>
         <td colspan="6">Grand Total   <?php echo $grand_total;?></td>
         </tr>
         </table>
         <a href="checkout.php" ><button type="submit" name="submit" <?php echo ($grand_total > 1)?'':'disabled' ?>>PROCEED TO CHECKOUT</button></a>
         <?php
     }else{
        echo '<p class="main-title">Your Cart Is Empty</p>';
     }

    ?>


    

    
</body>
</html>

<?php 
    include ("footer.php");
    ?>