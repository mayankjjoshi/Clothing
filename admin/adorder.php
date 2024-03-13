<?php
include('header.php');
// if(isset($_POST['update_order'])){
//     $order_id = $_POST['order_id'];
//     $payment_update = $_POST['update_payment'];
//     mysqli_query($con,"update ordered set payment_status='$payment_update' where id='$order_id'") or die('payment query Failed');
  
// }
if(isset($_POST['update_order_status'])){
    $order_id = $_POST['order_id'];
    $order_update = $_POST['update_order'];
    mysqli_query($con,"update ordered set order_status='$order_update' where id='$order_id'") or die('order query Failed');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        table{
    align-items: center;
    color: black;
    text-align: center;
    border-color: brown;
    width: 80%;
    border-collapse: collapse;
    margin: 20px 220px;
}
 table th,td{
    padding: 8px;
}
.view, .view-edit{
    border:1px solid black;
    background-color:red;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
    text-decoration:none;
    color:white;
}
.view:hover{
    background-color:lightyellow;
    color:black
}
.view-edit{
    background-color:lightskyblue;
    color:black
}
.view-edit:hover{
    background-color:lightyellow;
    color:black
}
.main-title{
    padding:20px;
    text-align:center;
}
    </style>
</head>
<body>
<p class="main-title">My Orders</p>

<?php

$select_orders=mysqli_query($con,"select ordered.*,order_status.name as order_status_str from ordered,order_status where  order_status.id=ordered.order_status") or die('query 1Failed');
if(mysqli_num_rows($select_orders)>0){
    ?>
    <table border="1">
        <tr>
            <th>#</th>
            <th>order_id</th>
            <th>Placed On</th>
            <th>Name & Contact No</th>
            <th>Address</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <!-- <th>Update payment Status</th> -->
            <th>Update order Status</th>
</tr>

    <?php
    while($fetch_orders=mysqli_fetch_assoc($select_orders)){
        ?>
        <form method="post" action="adorder.php">
        <tr>
              <td><a href="admin_orderdetail.php?id=<?php echo $fetch_orders['id'] ;?>" class="view">View</a></td>
              <td><?php echo $fetch_orders['id'] ;?></td>
              <td><?php echo $fetch_orders['added_on'] ;?></td>
              <td><?php echo $fetch_orders['name']; ?> <br> Contact No :: <?php echo $fetch_orders['number']; ?></td>
              <td><?php echo $fetch_orders['flat']; ?> &nbsp; <?php echo $fetch_orders['street']; ?><br>
              <?php echo $fetch_orders['city']; ?>  &nbsp; <?php echo $fetch_orders['state']; ?><br>
              <?php echo $fetch_orders['country']; ?> &nbsp; <?php echo $fetch_orders['pincode']; ?></td>
              
              <td><?php echo $fetch_orders['payment_type']; ?></td>
              <td><?php echo $fetch_orders['payment_status']; ?></td>
              <td><?php echo $fetch_orders['order_status_str']; ?></td>
              <!-- <td>
                    <form method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id'];?>">
                        <select name="update_payment">
                              <option value="pending">Pending</option>
                              <option value="completed">Completed</option>
                        </select><br><br>
                        <input type="submit" name="update_order" value="Update">
                    </form>
              </td> -->
              <td>
                    <form method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id'];?>">
                     

                        <select name="update_order">
                        <?php
                          $sql="select * from order_status";
                          $res=mysqli_query($con,$sql);
                        
                          while($row=mysqli_fetch_assoc($res)){
                            ?>
                             <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                            <?php
                          }
                         
                        ?>
                        </select><br><br>
                        <input type="submit" name="update_order_status" value="Update" class="view-edit">
                    </form>
              </td>
        </tr>
        
        </form>
        <?php
}
?>

</table>


<?php

}else{
    echo '<p class="main-title">No Order Places yet</p>';
}
?>
</body>
</html>



<?php
include ('./includes/footer.php');
?>