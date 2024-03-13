<?php
include ('header.php');
require('./includes/function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | ADMIN PANEL</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .page-title{
            text-align: center;
            padding: 13px;
        }
        .box-container{
            margin: 20px 300px;
            display: grid;
            grid-template-columns: 300px 300px 300px;
            gap:10px;
            /* border: 2px solid black; */
            width: 900px;
            height: 370px;
        }
        .box-container .box{
            text-align: center;
            margin: 20px;
            padding: 20px ;
            border: 2px solid black;
            border-radius: 10px;
            background-color:white;
            box-shadow: 0 10px 30px rgba(0,0,0, 0.9);
        }
        .box-container .box h3{
            font-size: 22px;
            padding: 5px;
        }
        .box-container .box p{
            font-size: 20px;
            padding-top: 15px;
        }
        
        </style>
</head>
<body>
    
   
<p class="page-title">DASHBOARD</p><br>
   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($con, "SELECT * FROM `ordered` WHERE payment_status = 'pending'") or die('query failed');
            while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
               $total_pendings += $fetch_pendings['total_price'];
            };
         ?>
         <h3>RS. <?php echo $total_pendings; ?>/-</h3>
         <p>Total Pendings Payment</p>
      </div>

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = mysqli_query($con, "SELECT * FROM `ordered` WHERE payment_status = 'completed'") or die('query failed');
            while($fetch_completes = mysqli_fetch_assoc($select_completes)){
               $total_completes += $fetch_completes['total_price'];
            };
         ?>
         <h3>Rs. <?php echo $total_completes; ?>/-</h3>
         <p>Completed Payments</p>
      </div>

      <div class="box">
         <?php
            $select_orders = mysqli_query($con, "SELECT * FROM `ordered`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Orders Placed</p>
      </div>

      <div class="box">
         <?php
            $select_products = mysqli_query($con, "SELECT * FROM `product`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>Products Added</p>
      </div>

      
      <div class="box">
         <?php
            $select_account = mysqli_query($con, "SELECT * FROM `user`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Total User Accounts</p>
      </div>

      <div class="box">
         <?php
            $select_messages = mysqli_query($con, "SELECT * FROM `contact_us`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>Total Comments</p>
      </div>

   </div>

</section>



</body>
</html>

<?php
include ('./includes/footer.php');
?>