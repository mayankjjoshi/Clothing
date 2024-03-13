<?php 
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        h2{
            text-align: center;
            margin-top:20px;
        }
        .center{
            margin:60px 0px;
            text-align: center;
            font-size: larger;
        }
        </style>
</head>
<body>
<h2>Account Details</h2>
    <div class="center">
        
    <?php
       if(isset($_SESSION['USER_LOGIN']) &&  $_SESSION['USER_LOGIN']!=''){
        // echo "FIRST NAME ".$_SESSION['FIRSTNAME']";
        // echo "FIRST NAME : ".$_SESSION['FIRSTNAME'] . "<br><br>";
        // echo "LAST NAME : ".$_SESSION['LASTNAME'] . "<br><br>";
        // echo "EMAIL : ".$_SESSION['EMAIL'] . "<br><br>";
        // echo "ID : ".$_SESSION['USERID'] . "<br><br>";
          ?>
          <p>Your Name :: <?php echo $_SESSION['FIRSTNAME'] ." ". $_SESSION['LASTNAME'] ?></p><br>
          <p>Email ID  :: <?php echo $_SESSION['EMAIL'] ?></p>
          <input type="hidden" value="<?php echo $_SESSION['USERID']?>">
          <?php
    }else{
        header('location:login.php');
        die();
    }
        
    ?>
    </div>
</body>
</html>

<?php 
    include ("footer.php");
    ?>
