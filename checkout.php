<?php
include('header.php');
include('./includes/function.php');
$errors = array();
// if(isset($_POST['order'])){

    

//         if(empty($_POST['email']) && empty($_POST['name']) && empty($_POST['phone'] && empty($_POST['method'])) && empty($_POST['ad1']) && empty($_POST['ad2']) && empty($_POST['city']) && empty($_POST['state']) && empty($_POST['country']) && empty($_POST['pincode'])){
//           $errors['err'] = "All Filed Is Required";
//          }else{
//           $email= ($_POST['email']);
//           if(!filter_var($email , FILTER_VALIDATE_EMAIL))
          

//           $errors['email_err'] = "Invaild Email Format";
//          }
      
        
    
      
//          if(count($errors) === 0){

//     $name = mysqli_real_escape_string($con,$_POST['name']);
//     $number = mysqli_real_escape_string($con,$_POST['phone']);
//     $email = mysqli_real_escape_string($con,$_POST['email']);
//     $method = mysqli_real_escape_string($con,$_POST['method']);
//     // $address = mysqli_real_escape_string($con,'flat no.'.$_POST['ad1'].','.$_POST['ad2'].','.$_POST['city'].','.$_POST['country'].'-'.$_POST['pincode']);
//     $address = mysqli_real_escape_string($con,$_POST['ad1'].','.$_POST['ad2'].','.$_POST['city'].','.$_POST['state'].','.$_POST['country'].'-'.$_POST['pincode']);
//     $placed_on = date('d-M-Y');
//     $cart_total=0;
//     $cart_products[]='';

//     $cart_query=mysqli_query($con,"select * from cart where user_id='$user_id'") or die('query failed');
//     if(mysqli_num_rows($cart_query)>0){
//         while($cart=mysqli_fetch_assoc($cart_query)){
//             $cart_products[]=$cart['name'].'('.$cart['quantity'].')';
//             $sub_total=($cart['price'] * $cart['quantity']);
//             $cart_total+=$sub_total;
//         }
//     }

//     $total_products=implode(' , ',$cart_products);
//     $order_query=mysqli_query($con,"select * from orders where name='$name' and number='$number' and email='$email' and method='$method' and address='$address' and total_products='$total_products' and total_price='$cart_total'") or die('query failed1');


//     if($cart_total==0){
//       ?>
     <script>
//         alert('Your cart is empty');
       </script>
      <?php
//     }elseif(mysqli_num_rows($order_query)>0){
//         ?>
      <script>
//         alert('order placed already');
       </script>
       <?php
//     }
//     else{
//     mysqli_query($con,"insert into orders(user_id,name,number,email,method,address,total_products,total_price,placed_on)values('$user_id','$name','$number','$email','$method','$address','$total_products','$cart_total','$placed_on')") or die('query failed2');
//     mysqli_query($con,"delete from cart where user_id='$user_id'") or die('query failed3');
//     header('Location:myorders.php');
//     ?>
      <script>
//         alert('order placed succesfully');
//         </script>
     <?php
//     }
// }
// }

if(isset($_POST['order'])){
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $number = mysqli_real_escape_string($con,$_POST['phone']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $flat = mysqli_real_escape_string($con,$_POST['ad1']);
  $street = mysqli_real_escape_string($con,$_POST['ad2']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $state = mysqli_real_escape_string($con,$_POST['state']);
  $country = mysqli_real_escape_string($con,$_POST['country']);
  $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
  $payment_type = mysqli_real_escape_string($con,$_POST['method']);
  $uid=$user_id;
  $cart_query=mysqli_query($con,"select * from cart where user_id='$uid'") or die('Query Failed');
  if(mysqli_num_rows($cart_query)>0)
  {
    $cart_total=0;
    $sub_total=0;
    while($cart=mysqli_fetch_assoc($cart_query)){
     $sub_total=($cart['price']*$cart['quantity']);
     $cart_total+=$sub_total;
     $product_id=$cart['pid'];
     $payment_status='pending';
     
    
     $total_price=$cart_total;
     $order_status='1';
     $added_on=date('y-m-d h:i:s');
     
    }
    mysqli_query($con,"INSERT INTO `ordered`(`user_id`, `name`, `number`, `email`, `flat`, `street`, `city`, `state`, `country`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES ('$uid','$name','$number','$email','$flat','$street','$city','$state','$country','$pincode','$payment_type','$cart_total','$payment_status','$order_status','$added_on')");

    $order_id=mysqli_insert_id($con);
    $cart_query=mysqli_query($con,"select * from cart where user_id='$user_id'") or die('query Failed');
    if(mysqli_num_rows($cart_query)>0){
      $cart_total=0;
    $sub_total=0;
    while($cart=mysqli_fetch_assoc($cart_query)){
      $product_id=$cart['pid'];
      $qty=$cart['quantity'];
      $price=$cart['price'];
      $sub_total=($cart['price']*$cart['quantity']);
      $added_on=date('y-m-d h:i:s');
      $cart_total+=$sub_total;

      mysqli_query($con,"INSERT INTO `order_detail`(`order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES ('$order_id','$product_id','$qty','$sub_total','$added_on')");
    }
  }
   mysqli_query($con,"DELETE FROM `cart` WHERE user_id='$uid'") or die('delete query failed');
   header('Location:order.php');

  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
         h2{
           color:black;
           text-align: center;
           padding-top: 14px;
           align-items: center;
         }
       .checkout-form{
        margin:10px auto;
        background-color:lightgrey;
        width: 90%;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 0 10px 30px rgba(0,0,0, 0.09);
       }
       .checkout-form form{
        padding: 10px;
       }
      
       .checkout-form form .filed{
        padding:10px;
        display: flex;
       }
       .checkout-form form .filed label{
         font-size: 20px;
         display: none;
       }
       .checkout-form form .filed input{
        height: 40px;
        width: 40%;
        margin: 10px 40px;
        outline: none;
        padding-left: 15px; 
        border-radius: 5px;
        font-size: 17px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        transition: all 0.3s ease;
       }
       .checkout-form form .filed select{
        height: 40px;
        width: 40%;
        margin: 10px 40px;
        outline: none;
        padding-left: 15px; 
        border-radius: 5px;
        font-size: 17px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        transition: all 0.3s ease;
       }
       .checkout-form form .filed button{
        height: 35px;
        width: 70%;
        color: #fff;    
        background-color:darkkhaki;
        border-radius: 5px;
        font-size: 20px;
        font-weight: 500;
        cursor: pointer;
        margin: 7px auto;
        color: black;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       }
       .error{
        padding-left: 120px;
        color:rosybrown;
      }
      .order{
        display:grid;
        grid-template-columns:320px 320px 320px;
        margin:5px 340px;
      }
      .total{
        text-align:center;
      }
    </style>
</head>
<body>
<h2>Address Detail</h2>
<div class="checkout-form">
<form method="post">
<span class="error"><?php if(isset($errors['err'])){ echo $errors['err']; }?></span><br>
    <div class="filed">
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter Your Name">
        <label>Number :</label>
        <input type="text" name="phone" placeholder="Enter Your Phone Number">
    </div>

    <div class="filed">
        <label>Email:</label> 
        <input type="email" name="email" placeholder="Enter Your email"><br>
      
        <label>Address Line 01:</label>
         <input type="text" name="ad1" placeholder="e.g. flat no.">
        
    </div>    

    <div class="filed">
         <label>Address Line 02:</label> 
         <input type="text" name="ad2" placeholder="e.g. street name">
       
         <label>City:</label>
         <input type="text" name="city" placeholder="e.g. Vadodara">
        
         <label>State:</label>
         <input type="text" name="state" placeholder="e.g. Gujarat">

    </div>
    

    <div class="filed">
         <label>Country:</label>
         <input type="text" name="country" placeholder="e.g. India">
        
         <label>Pincode:</label>
         <input type="text" name="pincode" min="6" max="6" placeholder="e.g. 490001">
       
         <label>Select Payment Mode:</label>
         <select name="method">
             <option value="cod">cash on delivery</option>
             <option value="paypal">Paypal</option>
          </select>
          
    </div> 
    <div class="filed">
    <button type="submit" name="order">Order Now</button>
    </div>
    </form>
</div>    
 <?php
    $cart_query=mysqli_query($con,"select * from cart where user_id='$user_id'") or die('Query Failed');
    if(mysqli_num_rows($cart_query)>0)
    {
 ?>
    <div class="order">
       <?php
         $cart_total=0;
         while($cart=mysqli_fetch_assoc($cart_query)){
          $sub_total=($cart['price']*$cart['quantity']);
          $cart_total+=$sub_total;
         
       ?>
       <div class="inner">
       <img src="./media/product/<?php echo $cart['image'];?>" width="10%" class="small-img" alt="">
       <p><?php echo $cart['name']?> &nbsp; &nbsp;  QTY :<?php echo $cart['quantity']?> <br>  Rs.<?php echo $cart['price']?></p><br>
       </div>
       <?php
    }
       ?>
    </div>
    <P class="total"> TOTAL :: <?php echo $cart_total; ?></p>
    <?php
    }
    ?>
    


</body>
</html>
