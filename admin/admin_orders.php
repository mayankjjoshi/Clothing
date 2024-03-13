<?php
include ('header.php');
if(isset($_POST['update_order'])){
    $order_id = $_POST['order_id'];
    $payment_update = $_POST['update_payment'];
    mysqli_query($con,"update orders set payment_status='$payment_update' where order_id='$order_id'") or die('query Failed');
    header("location:admin_orders.php");
     ?>
    <script>
    //  alert('Update Succesfully');
    <script>
    <?php
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($con,"delete from orders where order_id='$delete_id'") or die('query Failed');
    header("location:admin_orders.php");
     ?>
    <script>
    //  alert('Update Succesfully');
    <script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDERS | ADMIN PANEL</title>
</head>
<body>
<div class="main">
         <div class="top">
        <p>ORDERS PAGE</p> 
        </div><br>
        <?php
$select_orders=mysqli_query($con,"select * from orders") or die('query Failed');
if(mysqli_num_rows($select_orders)>0){
    ?>
    <table border="1">
        <tr>
            <th>Placed On</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Payment Status</th>
            <th>Your Orders</th>
            <th>Total Price</th>
            <th>Payment Status</th>
            <th>Update Payment</th>
            <th>Operation</th>
</tr>
    <?php
    while($fetch_orders=mysqli_fetch_assoc($select_orders)){
        ?>
        <tr>
              <td><?php echo $fetch_orders['placed_on'] ;?></td>
              <td><?php echo $fetch_orders['name']; ?></td>
              <td><?php echo $fetch_orders['number']; ?></td>
              <td><?php echo $fetch_orders['email']; ?></td>
              <td><?php echo $fetch_orders['address']; ?></td>
              <td><?php echo $fetch_orders['method']; ?></td>
              <td><?php echo $fetch_orders['total_products']; ?></td>
              <td><?php echo $fetch_orders['total_price']; ?></td>
              <td><?php echo $fetch_orders['payment_status']; ?></td>
              <td>
                    <form method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['order_id'];?>">
                        <select name="update_payment">
                              <!-- <option disabled selected><?php 
                            //   echo $fetch_orders['payment_status']; 
                              ?></option> -->
                              <option value="pending">Pending</option>
                              <option value="completed">Completed</option>
                        </select>
                        <input type="submit" name="update_order" value="Update">
                    </form>
              </td>
              <td><a href="admin_orders.php?delete=<?php echo $fetch_orders['order_id'];?>" onclick="return confirm('Are Sure You Want To Delete?');">Delete</a></td>
        </tr>
    
        <?php
}
?>
</table>
<?php

}else{
    ?>
    
    <p class="page-title">NO Orders Yet!!!</p>
    <?php
}
?>
</body>
</html>

<?php
include ('./includes/footer.php');
?>