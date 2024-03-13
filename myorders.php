<?php
include('header.php');

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
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        table{
     border-collapse:collapse;
     width:80%;
     margin:10px auto;
}
 table th,td{
    border:1px solid black;
    text-align:center;
}
th, td{
    padding:15px;
}
input[type="submit"]{
    background-color:lightskyblue;
    border:1px solid black;
    border-radius:4px;
    padding:5px;
}
    </style>
</head>
<body>
<p class="main-title">My Orders</p>

<?php
$select_orders=mysqli_query($con,"select * from orders where user_id='$user_id'") or die('query Failed');
if(mysqli_num_rows($select_orders)>0){
    ?>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Placed On</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Payment Mode</th>
            <th>Your Orders</th>
            <th>Total Price</th>
            <th>Payment Status</th>
</tr>
<form method="post" action="pdf.php">
    <?php
    while($fetch_orders=mysqli_fetch_assoc($select_orders)){
        ?>
        
        <tr>
              <td><input type="submit" name="submit" value="Generate PDF"></td>
              <td><?php echo $fetch_orders['placed_on'] ;?></td>
              <td><?php echo $fetch_orders['name']; ?></td>
              <td><?php echo $fetch_orders['number']; ?></td>
              <td><?php echo $fetch_orders['email']; ?></td>
              <td><?php echo $fetch_orders['address']; ?></td>
              <td><?php echo $fetch_orders['method']; ?></td>
              <td><?php echo $fetch_orders['total_products']; ?></td>
              <td><?php echo $fetch_orders['total_price']; ?></td>
              <td><?php echo $fetch_orders['payment_status']; ?></td>
        </tr>
        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['order_id'] ?>">
        <input type="hidden" name="placed_on" value="<?php echo $fetch_orders['placed_on'] ?>">
        <input type="hidden" name="name" value="<?php echo $fetch_orders['name'] ?>">
        <input type="hidden" name="number" value="<?php echo $fetch_orders['number'] ?>">
        <input type="hidden" name="email" value="<?php echo $fetch_orders['email'] ?>">
        <input type="hidden" name="address" value="<?php echo $fetch_orders['address'] ?>">
        <input type="hidden" name="method" value="<?php echo $fetch_orders['method'] ?>">
        <input type="hidden" name="price" value="<?php echo $fetch_orders['total_price'] ?>">
        <input type="hidden" name="status" value="<?php echo $fetch_orders['payment_status'] ?>">
       
        <?php
}
?>
</table>

</form>
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