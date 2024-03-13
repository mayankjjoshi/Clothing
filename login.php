<?php
$con = mysqli_connect("localhost","root","","fashion1");
if(!$con){
    echo "Connection Failed " . mysqli_connect_error();
}
$email = $pass= "";
$email_err = $pass_err = $err = ""; 
$errors = array();

if(isset($_POST['submit'])){

  if(empty($_POST['email'])){
    $errors['email_err'] = "Email ID Is Required";
   }else{
    $email= ($_POST['email']);
    if(!filter_var($email , FILTER_VALIDATE_EMAIL))
     $errors['email_err'] = "Invaild Email Format";
   }

  

  if(empty($_POST['password'])){
    $errors['pass_err'] = "Password Is Required";
   }

   # if(preg_match("/\S+/",$_POST['email']) === 0){
   #     $errors['email'] = "email Is Required";
    #  }
    #  if(preg_match("/\S+/",$_POST['password']) === 0){
    #    $errors['pass'] = "Password Is Required";
     # }
    #  if(preg_match("/.+@.+\..+/",$_POST['email']) === 0){
    #    $errors['email'] = "Invalid Email Id";
    #  }
     # if(preg_match("/.{6}/",$_POST['password']) === 0){
     #   $errors['pass'] = "Password Must 6 Character";
     # }

     if(count($errors) === 0){
     $email = mysqli_real_escape_string($con , $_POST['email']);
     $password = mysqli_real_escape_string($con , $_POST['password']);

        $check_email = mysqli_query($con ,"select * from user where email='$email' and password='$password'");
        $nums_row = mysqli_num_rows($check_email);
        if($nums_row>0){
          session_start();
             while($row=mysqli_fetch_assoc($check_email)){
              $user_id= $row['id'];
              $firstname = $row['fname'];
              $lastname = $row['lname'];
              $email=$row['email'];
              
              $_SESSION['USER_LOGIN']='yes';
              $_SESSION['USERID']=$user_id;
              $_SESSION['FIRSTNAME']=$firstname;
              $_SESSION['LASTNAME']=$lastname;
              $_SESSION['EMAIL']=$email;
             }
              header('Location:home.php');
              session_commit();
        }else{
           $errors['err'] = "Invalid Email & Password";
        }
      }
    }
    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Online Fashion Store | Men | Women | Kids</title>
    <style>
     body{
            margin: 0;
            padding: 0;
            background-color:rgb(215, 163, 51);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
     #logfrm{
          background-color:gainsboro;
          width: 40%;
          height: 400px;
          margin: 30px 360px;
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
      height: 40px;
      width: 60%;
      margin: 10px 90px;
      outline: none;
      padding-left: 15px; 
      border-radius: 5px;
      font-size: 17px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      transition: all 0.3s ease;
     }
    .error{
        padding-left: 120px;
        color:rosybrown;
      }
    .pass-link{
        padding-left: 290px;
      }
    .pass-link a{
      text-decoration: none;
      color: black;
    }
    .pass-link a:hover{
      text-decoration: underline;
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logfrm">
        <h2>SIGN IN</h2>
        <span class="error"><?php if(isset($errors['err'])){ echo $errors['err']; }?></span><br>
        <input type="email" name="email" maxlength="30" value="<?php echo $email;?>" placeholder="Email Address"><br>
        <span class="error"><?php if(isset($errors['email_err'])){ echo $errors['email_err'];} ?></span><br>
        <input type="password" name="password" maxlength="6" value="<?php echo $pass;?>" placeholder="Password"><br>
        <span class="error"><?php if(isset($errors['pass_err'])){ echo $errors['pass_err'];} ?></span><br>
        <span class="pass-link"><a href="forget.php">Forget Password ?</a></span><br>
       <button type="submit" name="submit">Login</button><br>
       <p>Don't have a account ?  <a href="account.php"> Sign up</a></p>
</form>
</body>
</html>