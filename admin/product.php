<?php
include ('header.php');
include('./includes/function.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $pro_id=get_safe_value($con,$_GET['pro_id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status="update product set status='$status' where pro_id='$pro_id'";
        mysqli_query($con,$update_status);
    }

    if($type=='delete'){
        $pro_id=get_safe_value($con,$_GET['pro_id']);
        $delete_pro="delete from product where pro_id='$pro_id'";
        mysqli_query($con,$delete_pro);
    }
}
 $sql = "select product.*,category.cat_name,sub_category.subcategory from product,category,sub_category where product.cat_id=category.cat_id and product.subcat_id=sub_category.subcategory_id order by product.pro_id desc";
 //$sql = "select product.*,category.cat_name from product,category where product.cat_id=category.cat_id order by product.pro_id desc";
$res = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | ADMIN PANEL</title>
    <style>
         .view, .view-edit{
    border:1px solid black;
    background-color:red;
    padding:5px;
    border-radius:5px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    font-size:16px;
    text-decoration:none;
    color:white;
}
.view:hover{
    background-color:lightyellow;
    color:black
}
.view-edit{
    background-color:lightskyblue;
    color:black
}
.view-edit:hover{
    background-color:lightyellow;
    color:black
}
        </style>
</head>
<body>
    <div class="main">
    <div class="top">
        <p>PRODUCT PAGE</p> 
        <a href="manage_product.php" class="add-button"><button type="submit">ADD NEW PRODUCT</button></a>
        </div><br>

        <table border="1" width="100%">
        <tr>
            <th>Sr.No</th>
            <th>PRODUCT ID</th>
            <th>CATEGORY NAME</th>
            <th>SUB CATEGORY NAME</th>
            <th>PRODUCT NAME</th>
            <th>IMAGE</th>
            <th>MRP</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>STATUS</th>
            <th>OPERATION</th>
        </tr>
        <?php 
        $i=1;
        while($row = mysqli_fetch_assoc($res)) {?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['pro_id']?></td>
            <td><?php echo $row['cat_name']?></td>
            <td><?php echo $row['subcategory']?></td>
            <td><?php echo $row['pname']?></td>
            <td><img src="../media/product/<?php echo $row['image']?>" width="100px"/></td>
            <td><?php echo $row['mrp']?></td>
            <td><?php echo $row['sprice']?></td>
            <td><?php echo $row['qty']?></td>
            <td>
                <?php 
                  if($row['status']==1){
                    echo "<span class='status'><a href='?type=status&operation=deactive&pro_id=".$row['pro_id']."'>Active</a></span>";
                  }else{
                    echo "<a href='?type=status&operation=active&pro_id=".$row['pro_id']."'>Deactive</a>";
                  }
                ?>
            </td>
            <td>
            <a href="?type=delete&pro_id=<?php echo $row['pro_id']?>" class="view">Delete</a>
             <a href="manage_product.php?pro_id=<?php echo $row['pro_id']?>" class="view-edit">Edit</a>
                <?php 
                //echo "<a href='?type=delete&pro_id=".$row['pro_id']."'>Delete</a> &nbsp;";
                //echo "&nbsp; <a href='manage_product.php?pro_id=".$row['pro_id']."'>Edit</a>";
                ?></td>
        <tr>
        <?php  $i++; }?>
    </table>
    </div>
</body>
</html>

<?php
 include ('./includes/footer.php');
?> 