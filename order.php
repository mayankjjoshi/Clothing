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
        table{
            
            border-collapse:collapse;
            width:80%;
            margin:20px 120px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
            font-size:16px;
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
}
button:hover{
    background-color:white;
}
.view{
    border:1px solid black;
    background-color:lightskyblue;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
}
.view:hover{
    background-color:white;
}
    </style>
</head>
<body>
<p class="main-title">My Orders</p>

<?php

$select_orders=mysqli_query($con,"select ordered.*,order_status.name as order_status_str from ordered,order_status where ordered.user_id='$user_id' and order_status.id=ordered.order_status") or die('query 1Failed');
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
</tr>

    <?php
    while($fetch_orders=mysqli_fetch_assoc($select_orders)){
        ?>
        <form method="post" action="order_detail.php">
        <tr>
              <td><a href="order_detail.php?id=<?php echo $fetch_orders['id'] ;?>" class="view">View Detail</a></td>
              <td><?php echo $fetch_orders['id'] ;?></td>
              <td><?php echo $fetch_orders['added_on'] ;?></td>
              <td><?php echo $fetch_orders['name']; ?> <br> Contact No :: <?php echo $fetch_orders['number']; ?></td>
              <td><?php echo $fetch_orders['flat']; ?> &nbsp; <?php echo $fetch_orders['street']; ?><br>
              <?php echo $fetch_orders['city']; ?>  &nbsp; <?php echo $fetch_orders['state']; ?><br>
              <?php echo $fetch_orders['country']; ?> &nbsp; <?php echo $fetch_orders['pincode']; ?></td>
              
              <td><?php echo $fetch_orders['payment_type']; ?></td>
              <td><?php echo $fetch_orders['payment_status']; ?></td>
              <td><?php echo $fetch_orders['order_status_str']; ?></td>
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
    include ("footer.php");
    ?>