<?php
include('header.php');
$order_id =$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
        }
        table{
            
            border-collapse:collapse;
            width:80%;
            margin:20px 120px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
            font-size:17px;
        }
 table th,td{
    padding: 8px;
    text-align:center;
     border-bottom:1px solid black; 
}
table tr:nth-child(even){
    background-color:white;
}
th{
    background-color:#04AA6D;
    color:white;
}
a{
    text-decoration:none;
    color:black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
}
button{
    border:1px solid black;
    background-color:lightskyblue;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
    margin:10px 320px;
}
button:hover{
    background-color:white;
}
p a{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: black;
    text-decoration: none;
    margin:10px 560px;
}
p a:hover{
    text-decoration: underline;
}
    </style>
</head>
<body>
<p class="main-title">Orders Detail</p>

<?php
$select_orders=mysqli_query($con,"select distinct(order_detail.orderdetail_id),order_detail.*,product.pname,product.image from order_detail,product,ordered where order_detail.order_id='$order_id' and ordered.user_id='$user_id' and product.pro_id=order_detail.product_id") or die('query Failed');
if(mysqli_num_rows($select_orders)>0){
    ?>
    <form method="get" action="invoice.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
    <button type="submit" name="submit">GENERATE PDF</button>
    <p><a href="order.php">Go Back To Order Page</a></p>
</form>
    <table border="1">
        <tr>
           
            <th>Product Name</th>
            <th>Product Image</th>
            <th>QTY</th>
            <th>Price</th>
            <th>Total Price</th>
           
</tr>

    <?php
    $total=0;
    while($fetch_orders=mysqli_fetch_assoc($select_orders)){
        $total=$total+($fetch_orders['price'] * $fetch_orders['qty']);
        ?>
        
        <tr>
            
              <td><?php echo $fetch_orders['pname'] ;?></td>
              <td><img src="./media/product/<?php echo $fetch_orders['image']  ?>" height="150px" class="small-img" alt=""></td>
              <td><?php echo $fetch_orders['qty'] ?></td>
              <td><?php echo $fetch_orders['price'] ?></td>
              <td><?php echo $fetch_orders['price'] * $fetch_orders['qty']?></td>
        </tr>
          
        
        <?php
}
?>
<tr>
            <td colspan="3"></td>
            <td>Total Price</td>
            <td><?php echo $total ?></td>
        </tr>
</table>


<?php

}else{
    echo '<p class="main-title">No Order Places yet</p>';
}
?>
</body>
</html>



<?php 
    include ("footer.php");
    ?>