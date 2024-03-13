<?php
require('header.php');
require('./includes/function.php');
$cat_id='';
$subcat_id='';
$pname='';
$mrp='';
$sprice='';
$qty='';
$image='';
$image2='';
$image3='';
$image4='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';

$msg='';
$image_required='required';
$image2_required='required';
$image3_required='required';
$image4_required='required';
if(isset($_GET['pro_id']) && $_GET['pro_id']!=''){
    $image_required='';
    $image2_required='';
    $image3_required='';
    $image4_required='';
    $product_id = get_safe_value($con,$_GET['pro_id']);
    $sql="select * from product where pro_id='$product_id'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $cat_id=$row['cat_id'];
        $subcat_id=$row['subcat_id'];
        $pname=$row['pname'];   
        $mrp=$row['mrp'];
        $sprice=$row['sprice']; 
        $qty=$row['qty'];
        $short_desc=$row['short_desc'];
        $description=$row['description'];
        $meta_title=$row['meta_title'];
        $meta_desc=$row['meta_desc'];
        $meta_keyword=$row['meta_keyword'];
    }
    else{
        header('Location:product.php');
        die();
    }
}


if(isset($_POST['submit'])){
    $cat_id = get_safe_value($con,$_POST['cat_id']);
    $subcat_id = get_safe_value($con,$_POST['subcat_id']);
    $pname = get_safe_value($con,$_POST['pname']);
    $mrp = get_safe_value($con,$_POST['mrp']);
    $sprice = get_safe_value($con,$_POST['sprice']);
    $qty = get_safe_value($con,$_POST['qty']);
    $short_desc = get_safe_value($con,$_POST['short_desc']);
    $description = get_safe_value($con,$_POST['description']);
    $meta_title = get_safe_value($con,$_POST['meta_title']);
    $meta_desc = get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword = get_safe_value($con,$_POST['meta_keyword']);

    $sql="select * from product where pname='$pname'";
    $res=mysqli_query($con,$sql);
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['pro_id']) && $_GET['pro_id']!=''){
              $getData=mysqli_fetch_assoc($res);
              if($product_id==$getData['pro_id']){

              }else{
                $msg="Product Already Exists";
              }
        }else{
            $msg="Product Already Exists";
        }
    }

    // if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' &&
    //    $_FILES['image']['type']!='image/jpeg'){
    //     $msg="Plz upload only jpg ,jpeg,png image format";
    //    }

    if($msg==''){
        if(isset($_GET['pro_id']) && $_GET['pro_id']!=''){
            if($_FILES['image']['name']!='' && $_FILES['image2']['name']!='' && $_FILES['image3']['name']!='' && $_FILES['image4']['name']!=''){
                $image=rand(1111111111,9999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);
                $image2=rand(1111111111,9999999999).'_'.$_FILES['image2']['name'];
                move_uploaded_file($_FILES['image2']['tmp_name'],'../media/product/'.$image2);
                $image3=rand(1111111111,9999999999).'_'.$_FILES['image3']['name'];
                move_uploaded_file($_FILES['image3']['tmp_name'],'../media/product/'.$image3);
                $image4=rand(1111111111,9999999999).'_'.$_FILES['image4']['name'];
                move_uploaded_file($_FILES['image4']['tmp_name'],'../media/product/'.$image4);
                $update_sql="UPDATE product SET cat_id='$cat_id',subcat_id='$subcat_id',pname='$pname',mrp='$mrp',sprice='$sprice',qty='$qty',
                short_desc='$short_desc',description='$decription',meta_title='$meta_title',meta_desc='$meta_desc',
                meta_keyword='$meta_keyword',image='$image',image2='$image2',image3='$image3',image4='$image4' WHERE pro_id='$product_id'";
            }else{
                $update_sql="UPDATE product SET cat_id='$cat_id',subcat_id='$subcat_id',pname='$pname',mrp='$mrp',sprice='$sprice',qty='$qty',
                short_desc='$short_desc',description='$decription',meta_title='$meta_title',meta_desc='$meta_desc',
                meta_keyword='$meta_keyword' WHERE pro_id='$product_id'";
            }
            $res=mysqli_query($con,$update_sql);
                    
                }else{
                $image=rand(1111111111,9999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);
                $image2=rand(1111111111,9999999999).'_'.$_FILES['image2']['name'];
                move_uploaded_file($_FILES['image2']['tmp_name'],'../media/product/'.$image2);
                $image3=rand(1111111111,9999999999).'_'.$_FILES['image3']['name'];
                move_uploaded_file($_FILES['image3']['tmp_name'],'../media/product/'.$image3);
                $image4=rand(1111111111,9999999999).'_'.$_FILES['image4']['name'];
                move_uploaded_file($_FILES['image4']['tmp_name'],'../media/product/'.$image4);
                $sql = "insert into product(cat_id,subcat_id,pname,mrp,sprice,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,image2,image3,image4)values('$cat_id','$subcat_id','$pname','$mrp','$sprice','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$image2','$image3','$image4')";
                $res = mysqli_query($con,$sql);
                }
                header('Location:product.php');
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
    <title>Manage Product | ADMIN PANEL</title>
<style>
input ,select{
    box-sizing: border-box;
    border-color: black;
    line-height: 30px;
    width: 200px;
    text-indent: 10px;
}
button[type="submit"]{
    background-color: black;
    color:white;
    font-weight:initial;
    cursor: pointer;
    text-align: center;
    width: 250px;
    height: 34px;
}
label{
    /* float: left; */
    /* width: 13em; */
    font-size: 16px;
}
button[type="submit"]:hover{
    background-color:linen;
    color:black;
}
#catfrm{
  display:flex;
  flex-wrap: wrap;
  width: 90%;
  margin: 10px auto;
  padding: 10px; 
  color:black;
  text-align: center;
  background-color: white;
}
#catfrm .filed{
    /* display:flex; */
    margin: 20px;
}
.top p a{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: black;
    text-decoration: underline;
}
.filed-error{
    color:red;
}
</style>
</head>
<body>
    <div class="main">
    <div class="top">
        <p>MANAGE PRODUCT</p> 
        <p><a href="product.php" class="add-button">Go Back To Product Page</a></p> 
        </div><br>
        <form method="post" id="catfrm" enctype="multipart/form-data">
    <div class="filed-error"><?php echo $msg ?></div>
        <div class="filed">
        <label>Category :</label>
        <select name="cat_id" required onchange="my(this)">
          <option>Select Category</option>
          <?php
          $res = mysqli_query($con,"select cat_id,cat_name from category order by cat_name asc");
          while($row=mysqli_fetch_assoc($res)){
            if($row['cat_id']==$cat_id)
            {
               echo " <option selected value=".$row['cat_id'].">".$row['cat_name']."</option>";
            }else{
               echo " <option value=".$row['cat_id'].">".$row['cat_name']."</option>";
            }  
          }
          ?>
        </select><br><br>
        </div>
        <div class="filed">
        <label>Sub Category :</label>
        <select id="subcat_id" name="subcat_id" required>
          <option>Select SUb Category</option>
          <!-- <?php
          /* $res = mysqli_query($con,"select cat_id,cat_name from category order by cat_name asc");
          while($row=mysqli_fetch_assoc($res)){
            if($row['cat_id']==$cat_id)
            {
               echo " <option selected value=".$row['cat_id'].">".$row['cat_name']."</option>";
            }else{
               echo " <option value=".$row['cat_id'].">".$row['cat_name']."</option>";
            }  
          } */
          ?> -->
        </select><br><br>
        </div>
        <div class="filed">
        <label>Product Name :</label>
        <input type="text"  name="pname" placeholder="Enter Product Name" value="<?php echo $pname?>" required><br><br>
        </div>
        <div class="filed">
        <label>MRP :</label>
        <input type="text"  name="mrp" placeholder="Enter Product MRP" value="<?php echo $mrp?>" required><br><br>
        </div>
        <div class="filed">
        <label>Selling Price :</label>
        <input type="text"  name="sprice" placeholder="Enter Product Price" value="<?php echo $sprice?>" required><br><br>
        </div>
        <div class="filed">
        <label>Quantity :</label>
        <input type="text"  name="qty" placeholder="Enter Product Quantity" value="<?php echo $qty?>" required><br><br>
        </div>
        <div class="filed">
        <label>Image 1:</label>
        <input type="file"  name="image" <?php echo $image_required?>><br><br>
        </div>
        <div class="filed">
        <label>Image 2:</label>
        <input type="file"  name="image2" <?php echo $image2_required?>><br><br>
        </div>
        <div class="filed">
        <label>Image 3:</label>
        <input type="file"  name="image3" <?php echo $image3_required?>><br><br>
        </div>
        <div class="filed">
        <label>Image 4:</label>
        <input type="file"  name="image4" <?php echo $image4_required?>><br><br>
        </div>
        <div class="filed">
        <label>Short Description :</label>
        <textarea  name="short_desc" placeholder="Enter Product Short Description" required><?php echo $short_desc?></textarea><br><br>
        </div>
        <div class="filed">
        <label>Description :</label>
        <textarea  name="description" placeholder="Enter Product Description" required><?php echo $description?></textarea><br><br>
        </div>
        <div class="filed">
        <label>Meta Title :</label>
        <textarea  name="meta_title" placeholder="Enter Product Meta Title"><?php echo $meta_title?></textarea><br><br>
        </div>
        <div class="filed">
        <label>Meta Description :</label>
        <textarea  name="meta_desc" placeholder="Enter Product Meta Description"><?php echo $meta_desc?></textarea><br><br>
        </div>
        <div class="filed">
        <label>Meta Keyword :</label>
        <textarea  name="meta_keyword" placeholder="Enter Product Meta Keyword"><?php echo $meta_keyword?></textarea><br><br>
        </div>
        <button type="submit" name="submit">INSERT PRODUCT</button><br><br>
        <!-- <p><a href="product.php">Go Back To Product Page</a></p> -->
    </form>
        
        
    </div>
    <script>
        async function my(element) {
            //console.log(event, u);
            console.log(element);
            let cat = element.value
            console.log(element.options, element.selectedIndex, element.options[element.selectedIndex])
            let res = await fetch("./fetch_sub_category.php?cat=" + cat);
            let data = await res.text();
            console.log(data);
            document.getElementById('subcat_id').innerHTML = data;
        }
    </script>
</body>
</html>


<?php
require('./includes/footer.php');
?>