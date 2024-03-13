<?php
require('header.php');
require('./includes/function.php');
$cat_name='';
$msg='';
if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
    $category_id = get_safe_value($con,$_GET['cat_id']);
    $sql="select * from category where cat_id='$category_id'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $cat_name=$row['cat_name'];    
    }
    else{
        header('Location:category.php');
        die();
    }
}


if(isset($_POST['submit'])){
    $category_name = get_safe_value($con,$_POST['catname']);

    $sql="select * from category where cat_name='$category_name'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
              $getData=mysqli_fetch_assoc($res);
              if($category_id==$getData['cat_id']){

              }else{
                $msg="Category Already Exists";
              }
        }else{
            $msg="Category Already Exists";
        }
    }
    if($msg==''){
        if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
        // $sql1 = "update category set cat_name='$category_name' where cat_id='$cat_id'";
     // $sql= "update category set cat_name='$category_name' where cat_id='$cat_id'";
                  $sql="UPDATE category SET cat_name='$category_name' WHERE cat_id='$category_id'";
                    $res=mysqli_query($con,$sql);
                }else{
                $sql = "insert into category(cat_name,status)values('$category_name','1')";
                $res = mysqli_query($con,$sql);
                }
                header('Location:category.php');
                die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category | ADMIN PANEL</title>
<style>
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
    width: 13em;
    font-size: 20px;
}
button[type="submit"]:hover
{
    background-color:linen;
    color:black;
}
    #catfrm{
  width: 50%;
  margin: 80px auto;
  padding: 10px; 
  color:black;
  text-align: center;
  background-color: white;
}
#catfrm p a{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: black;
    text-decoration: underline;
    padding-left: 300px;
}
.filed-error{
    color:red;
}
</style>
</head>
<body>
    <div class="main">
        <p class="page-title">MANAGE CATEGORY</p>
    <form method="post" id="catfrm">
    <div class="filed-error"><?php echo $msg ?></div>
        <label>Category Name</label><br><br>
        <input type="text"  name="catname" placeholder="Enter Category Name" value="<?php echo $cat_name?>" required><br><br>
        <button type="submit" name="submit">INSERT CATEGORY</button><br><br>
        <p><a href="category.php">Go Back To Category Page</a></p>
    </form>
    </div>
</body>
</html>

<?php
require('./includes/footer.php');
?>