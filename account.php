<?php
require('./includes/config.php');
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(preg_match("/\S+/",$_POST['fname']) === 0){
        $errors['fname'] = "First Name Is Required";
      }
      if(!preg_match("/^[a-zA-Z]*/",$_POST['fname']) === 0){
        $errors['fname'] = "only character are allow";
      }
      if(preg_match("/\S+/",$_POST['lname']) === 0){
        $errors['lname'] = "Last Name Is Required";
      }
      if(preg_match("/\S+/",$_POST['email']) === 0){
        $errors['email'] = "email Is Required";
      }
      if(preg_match("/\S+/",$_POST['password']) === 0){
        $errors['pass'] = "Password Is Required";
      }
      if(preg_match("/.+@.+\..+/",$_POST['email'])=== 0){
        $errors['email'] = "Invalid Email Id";
      }
      if(preg_match("/.{5,}/",$_POST['password']) === 0){
        $errors['pass'] = "Password Must 6 Character";
      }
      if(count($errors) === 0){
        $fname = mysqli_real_escape_string($con , $_POST['fname']);
        $lname = mysqli_real_escape_string($con , $_POST['lname']);
        $email = mysqli_real_escape_string($con , $_POST['email']);
        $password = mysqli_real_escape_string($con , $_POST['password']);

        $check_email = mysqli_query($con ,"SELECT * FROM user WHERE email = '$email'");
        $nums_row = mysqli_num_rows($check_email);
        if($nums_row >= 1){
               $errors['email'] = "Email Already Exists";
        }else{
            $d = date('d-M-Y');
            $insert = "INSERT INTO user(fname, lname, email, password, create_date) VALUES ('$fname', '$lname' ,'$email' , '$password', '$d')";
            $query = mysqli_query($con , $insert);
            $success = "You are successfully registered";
             header('Location:login.php');
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
    <title>Account | Online Fashion Store | Men | Women | Kids</title>
   <style>
     body{
            margin: 0;
            padding: 0;
            background-color:darkkhaki;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
     #logfrm{
          background-color:gainsboro;
          width: 40%;
          height: 530px;
          margin: 20px 360px;
          border-radius: 10px;
          box-shadow: 0 10px 30px rgba(0,0,0, 0.9);
      } 
     #logfrm h2{
           color:black;
           text-align: center;
           padding-top: 14px;
           align-items: center;
     }
     #logfrm input{
      height: 35px;
      width: 60%;
      margin: 10px 90px;
      outline: none;
      padding-left: 15px; 
      border-radius: 5px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 17px;
      transition: all 0.3s ease;
     }
    .error{
        padding-left: 120px;
        color:rosybrown;
      }
  button[type="submit"]{
       height: 35px;
       width: 63%;
       color: #fff;    
       background-color: black;
       border-radius: 5px;
       font-size: 20px;
       font-weight: 500;
       cursor: pointer;
       margin: 7px 90px;
       font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    p{
      text-align: center;
      font-size: 18px;
    }
    p a{
      text-decoration: none;
      color: black;
    }
    p a:hover{
      text-decoration: underline;
    }
  </style>
</head>
<body>
    <form method="post" action="account.php" id="logfrm">
        <h2>SIGN UP</h2>
        <span class="error"><?php if(isset($success)){ echo $success; }?></span><br>
        <input type="text" name="fname" value="<?php if(isset($_POST['fname'])) {echo $_POST['fname'];}?>" placeholder="First Name"><br>
        <span class="error"><?php if(isset($errors['fname'])){ echo $errors['fname'];} ?></span><br>
        <input type="text" name="lname" value="<?php if(isset($_POST['lname'])) {echo $_POST['lname'];}?>" placeholder="Last Name"><br>
        <span class="error"><?php if(isset($errors['lname'])){ echo $errors['lname'];} ?></span><br>
        <input type="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" placeholder="Email Address"><br>
        <span class="error"><?php if(isset($errors['email'])){ echo $errors['email'];} ?></span><br>
        <input type="password" name="password" maxlength="6" value="<?php if(isset($_POST['pass'])) {echo $_POST['pass'];}?>" placeholder="Password"><br>
        <span class="error"><?php if(isset($errors['pass'])){ echo $errors['pass'];} ?></span><br><br>
       <button type="submit" name="submit">Register</button>
       <p>Already have account ?  <a href="login.php"> Sign In</a></p>
    </form>
</body>
</html>