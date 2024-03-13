<?php
require('header.php');
require('./includes/function.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_cat="delete from user where id='$id'";
        mysqli_query($con,$delete_cat);
    }
}
$sql = "select * from user order by id desc";
$res = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | ADMIN PANEL</title>
    <style>
        .view{
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
        </style>
</head>
<body>
    <div class="main">
        <p class="page-title">USER DATA PAGE</p><br>
        <table border="1" width="100%">
        <tr>
            <th>Sr.No</th>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>CREATE DATE</th>
            <th>OPERATION</th>
        </tr>
        <?php 
        $i=1;
        while($row = mysqli_fetch_assoc($res)) {?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['fname']?></td>
            <td><?php echo $row['lname']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['create_date']?></td>
            <td>
                <a href="?type=delete&id=<?php echo $row['id'] ?>" class="view">Delete</a>
                <?php 
                // echo "<a href='?type=delete&id=".$row['id']."'>Delete</a> &nbsp;";
                ?></td>
        <tr>
        <?php  $i++; }?>
    </table>
    </div>
</body>
</html>



<?php
require('./includes/footer.php');
?>