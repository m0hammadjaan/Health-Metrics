<?php include('connections.php');
include('header.php');
error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

        <h1 class="text-center text-primary">Dependent Token</h1>

    
<form action="" method="POST">
        <div class="form-group">  <h6 class="font-weight-bold">Dependent ID</h6><input class="form-control" type="number" placeholder="Search" name="depid" id=""></div>
        <input class="btn btn-outline-primary" type="submit" name="search" value="Search">
</form>
</div>
<div class="col-md-4"></div>
</div>
<?php
if(isset($_POST['search']))
{
    $search_id=$_POST['depid'];
    $sql="select * from dependents where DEPID={$search_id}";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
    <table class="table table-bordered border-primary text-center">
        <tr>
            <th>EMPLOYEE ID</th>
            <th>DEPENDENT ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>CNIC</th>
            <th>DATE OF BIRTH</th>
            <th>ACTIONS</th>
        </tr>
        <?php

    while($data=mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?php echo $data['EMPID']; ?></td>
            <td><?php echo $data['DEPID']; ?></td>
            <td><?php echo $data['DEP_FNAME']; ?></td>
            <td><?php echo $data['DEP_LNAME']; ?></td>
            <td><?php echo $data['GENDER']; ?></td>
            <td><?php echo $data['DEP_CNIC']; ?></td>
            <td><?php echo $data['DOB']; ?></td>
            <td><a class="btn btn-outline-primary" href="dep_token_add.php?id=<?php echo $data['DEPID']; ?>">Token</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php } 
    else
    {
        echo '<h1 class="text-center text-danger">No Record found :(</h1>';
    }
    mysqli_close($conn);
}
?>
</body>
</html>