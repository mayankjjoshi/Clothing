<?php
include ('header.php');
include('./includes/function.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $cat_id=get_safe_value($con,$_GET['cat_id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status="update sub_category set status='$status' where subcategory_id='$cat_id'";
        mysqli_query($con,$update_status);
    }

    if($type=='delete'){
        $cat_id=get_safe_value($con,$_GET['cat_id']);
        $delete_cat="delete from sub_category where subcategory_id='$cat_id'";
        mysqli_query($con,$delete_cat);
    }
}
$sql = "select sub_category.*,category.cat_name from sub_category,category where category.cat_id=sub_category.cat_id order by sub_category.subcategory asc";
$res = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Category | ADMIN PANEL</title>
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
        <p>SUB CATEGORY PAGE</p> 
        <a href="manage_subcategory.php" class="add-button"><button type="submit">ADD NEW SUB CATEGORY</button></a>
        </div><br>
        <table border="1" width="100%">
        <tr>
            <th>Sr.No</th>
            <th>SUB CATEGORY ID</th>
            <th>CATEGORY NAME</th>
            <th>SUB CATEGORY NAME</th>
            <th>STATUS</th>
            <th>OPERATION</th>
        </tr>
        <?php 
        $i=1;
        while($row = mysqli_fetch_assoc($res)) {?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['subcategory_id']?></td>
            <td><?php echo $row['cat_name']?></td>
            <td><?php echo $row['subcategory']?></td>
            <td>
                <?php 
                  if($row['status']==1){
                    echo "<span class='status'><a href='?type=status&operation=deactive&cat_id=".$row['subcategory_id']."'>Active</a></span>";
                  }else{
                    echo "<a href='?type=status&operation=active&cat_id=".$row['subcategory_id']."'>Deactive</a>";
                  }
                ?>
            </td>
            <td>
            <a href="?type=delete&cat_id=<?php echo $row['subcategory_id']?>" class="view">Delete</a>
            <a href="manage_subcategory.php?cat_id=<?php echo $row['subcategory_id']?>" class="view-edit">Edit</a>
                <?php 
                //echo "<a href='?type=delete&cat_id=".$row['subcategory_id']."'>Delete</a> &nbsp;";
              //  echo "<a href='manage_subcategory.php?cat_id=".$row['subcategory_id']."'>Edit</a>";
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