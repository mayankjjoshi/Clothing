<?php
include('header.php');
// include('./includes/config.php');
$con = mysqli_connect("localhost","root","","clothing");
if(!$con){
    echo "Connection Failed " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER VIEW | ADMIN PANEL | Online Fashion Store | Men | Women | Kids</title>
</head>
<body>
<!-- ===  main section starts === -->
<div class="main">
        <h2>User Details</h2>
    <table border="1" width="40%">
        <tr>
            <th width="1%">Sr.No</th>
            <th width="1%">ID</th>
            <th width="5%">FIRST NAME</th>
            <th width="5%">LAST NAME</th>
            <th width="10%">EMAIL ID</th>
            <th width="3%">PASSWORD</th>
            <th width="5%">CREATION DATE</th>
            <th width="3%">STATUS</th>
            <th width="5%">ACTION</th>
        </tr>
        <?php
        $query = "select * from user";
        $result= mysqli_query($con ,$query);
        if(mysqli_num_rows($result)>0){
            $i=1;
           while($row = mysqli_fetch_array($result)){
            ?>
         <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['create_date']; ?></td>
            <td><span>ACTIVE</span></td>
            <td><span>
                <button>EDIT</button>
                <button>DELETE</button>
            </span></td>
          </tr>
          <?php
          $i++;
           }
        }
        ?>
    </table>
</div>
    <!-- ===  main section ends === -->
</body>
</html>
<?php
include('footer.php');
?>