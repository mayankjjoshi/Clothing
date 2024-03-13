<?php
require('header.php');
require('./includes/function.php');
$cat_name='';
$subcategory='';
$msg='';
if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
    $subcategory_id = get_safe_value($con,$_GET['cat_id']);
    $sql="select * from sub_category where subcategory_id='$subcategory_id'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $cat_id=$row['cat_id'];
        $subcategory_name=$row['subcategory'];    
    }
    else{
        header('Location:subcategory.php');
        die();
    }
}


if(isset($_POST['submit'])){
    $subcategory_name = get_safe_value($con,$_POST['subcategory']);
    $cat_id=get_safe_value($con,$_POST['cat_id']);
    $sql="select * from sub_category where cat_id='$cat_id' and subcategory='subcategory_name'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
              $getData=mysqli_fetch_assoc($res);
              if($cat_id==$getData['cat_id']){

              }else{
                $msg="sub Category Already Exists";
              }
        }else{
            $msg="sub Category Already Exists";
        }
    }
    if($msg==''){
        if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
        // $sql1 = "update category set cat_name='$category_name' where cat_id='$cat_id'";
     // $sql= "update category set cat_name='$category_name' where cat_id='$cat_id'";
                  $sql="UPDATE sub_category SET cat_id='$cat_id',subcategory='$subcategory_name' WHERE subcategory_id='$subcategory_id'";
                    $res=mysqli_query($con,$sql);
                }else{
                $sql = "insert into sub_category(cat_id,subcategory,status)values('$cat_id','$subcategory_name','1')";
                $res = mysqli_query($con,$sql);
                }
                header('Location:subcategory.php');
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
    width: 16em;
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
        <p class="page-title">MANAGE SUB CATEGORY</p>
    <form method="post" id="catfrm">
    <div class="filed-error"><?php echo $msg ?></div>
        <label>Category Name</label>
        <select name="cat_id" required>
            <option>select Category</option>
            <?php
            
               $sql=mysqli_query($con,"select * from category where status='1'");

               while($row=mysqli_fetch_assoc($sql)){
                if($row['cat_id']==$cat_id){
                    echo "<option value=".$row['cat_id']." selected>".$row['cat_name']."</option>";
                }
                else{
                    echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
               }
            }
            ?>
        </select><br><br><br>
        <label>Sub Category Name</label><br>
        <input type="text"  name="subcategory" placeholder="Enter Sub Category Name" value="<?php echo $subcategory?>" required><br><br>
        <button type="submit" name="submit">INSERT SUB CATEGORY</button><br><br>
        <p><a href="subcategory.php">Go Back To Sub Category Page</a></p>
    </form>
    </div>
</body>
</html>

<?php
require('./includes/footer.php');
?>