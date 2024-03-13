<?php
require('./includes/connection.php');
require('./includes/function.php');
$msg='';
if(isset($_POST['submit'])){
  $username = get_safe_value($con,$_POST['username']);
  $password = get_safe_value($con,$_POST['password']);
  $sql = "select * from admin_user where username='$username' and password='$password'";
  $res = mysqli_query($con ,$sql);
  $count = mysqli_num_rows($res);
  if($count>0){
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('Location:home.php');
      die();
  }else{
    $msg="Please Enter Correct Login details";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ADMIN PANEL</title>
    <style>
    body{
          background-color:burlywood;
          font-size: 1.2rem;
          font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          color: #2b3e51;
        }

    h5{
          font-weight: 200;
          color:cadetblue;
          font-size:25px;
     }

input{
    box-sizing: border-box;
    border-color: black;
    line-height: 35px;
    width: 400px;
    text-indent: 10px;
}

button[type="submit"]{
    background-color: black;
    color:white;
    font-weight:initial;
    cursor: pointer;
    text-align: center;
    width: 400px;
    height: 34px;
}
label{
    float: left;
    width: 19em;
    /* margin-right: 1em; */
}
button[type="submit"]:hover
{
    background-color:blanchedalmond;
    color:black;
}
#logfrm{
  width: 50%;
  margin: 80px auto;
  /* padding: 10px; */
  color:black;
  text-align: center;
  border: 3px solid black;
  border-radius: 7px;
  background-color: white;
}
.filed-error{
    color:red;
}
</style>
</head>
<body>
    <form method="post" id="logfrm">
        <h5>ADMIN LOGIN</h5>
        <div class="filed-error"><?php echo $msg ?></div>
        <label>Username</label>
        <input type="text"  name="username" required><br><br>
        <label>Password </label><br>
        <input type="password"  name="password" maxlength="6" minlength="6" required><br><br>
        <button type="submit" name="submit">SIGN IN</button><br><br>
    </form>
</body>
</html>