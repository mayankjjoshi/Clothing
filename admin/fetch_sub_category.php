<?php
    require('./includes/connection.php');
    require('./includes/function.php');
    $cat = $_GET['cat'];
    $res = mysqli_query($con,"select * from sub_category where cat_id='$cat'");
    //echo mysqli_fetch_all($res);
    while($row=mysqli_fetch_assoc($res)){
        echo " <option value=".$row['subcategory_id'].">".$row['subcategory']."</option>"; 
    }
?>
