<?php
include('header.php');
include('./includes/function.php');

$errors = array();
if(isset($_POST['submit'])){
        if(empty($_POST['email']) && empty($_POST['name']) && empty($_POST['phone'] && empty($_POST['query']))){
          $errors['err'] = "All Filed Is Required";
         }else{
          $email= ($_POST['email']);
          if(!filter_var($email , FILTER_VALIDATE_EMAIL))
          $errors['email_err'] = "Invaild Email Format";
         }
      

         if(count($errors) === 0){
                    $name = mysqli_real_escape_string($con,$_POST['name']);
                    $number = mysqli_real_escape_string($con,$_POST['phone']);
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $query = mysqli_real_escape_string($con,$_POST['query']);
                    $d = date('d-M-Y');
            $sql = "insert into contact_us(name,email,mobile,comment,added_on)values('$name','$email','$number','$query','$d')";
            //echo $sql;
            $run=mysqli_query($con,$sql);
            if($run){
                //echo "sucesss";
            }else{
                //echo "Failed";
            }
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us </title>
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
       .checkout-form form .filed textarea{
        /* height: 120px;
        width: 100%; */
        margin: 10px 40px;
        outline: none;
        padding-left: 15px; 
        border-radius: 5px;
        padding-top: 20px;
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
        color:red;
      }
    </style>
</head>
<body>
<h2>Contact Us</h2>
<div class="checkout-form">
<form method="post">
<span class="error"><?php if(isset($errors['err'])){ echo $errors['err']; }?></span><br>
    <div class="filed">
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter Your Name">
        <label>Number :</label>
        <input type="text" name="phone" placeholder="Enter Your Phone Number">
        <label>Email:</label> 
        <input type="email" name="email" placeholder="Enter Your email"><br>  
    </div>
       
    <div class="filed">
    <label>Comments:</label> 
        <textarea name="query" placeholder="Enter Your Comments ......" rows="12" cols="120"></textarea>
    </div>    

   
    <div class="filed">
    <button type="submit" name="submit">Submit</button>
    </div>

</form>
</div>
</body>
</html>

<?php
include('footer.php');
?>