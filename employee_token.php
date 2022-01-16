<?php
include('connections.php');
include('header.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<center>
        <h1>Employee Token</h1>
    </center>
    
    <form action="" method="POST">
        Empployee ID<input type="number" placeholder="Search" name="empid" id="">
        <input type="submit" name="search" value="Search">
</form>
        <?php
        if(isset($_POST['search'])){
            $search_id=$_POST['empid'];
            
    $sql="select * from employee where EMPID={$search_id}";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
    <table border="1" class="table table-bordered border-primary">
        <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>EMAIL</th>
            <th>DESIGNATION</th>
            <th>CONTACT</th>
            <th>CNIC</th>
            <th>DATE OF BIRTH</th>
            <th>ACTIONS</th>
        </tr>
        <?php

    while($data=mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?php echo $data['EMPID']; ?></td>
            <td><?php echo $data['EMP_FNAME']; ?></td>
            <td><?php echo $data['EMP_LNAME']; ?></td>
            <td><?php echo $data['GENDER']; ?></td>
            <td><?php echo $data['EMP_EMAIL']; ?></td>
            <td><?php echo $data['DESIGNATION']; ?></td>
            <td><?php echo $data['EMP_CONTACT']; ?></td>
            <td><?php echo $data['EMP_CNIC']; ?></td>
            <td><?php echo $data['DOB']; ?></td>
            <td>
                <a class="btn btn-primary" href="emp_token_add.php?id=<?php echo $data['EMPID']; ?>">Token</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php } 
    else
    {
        echo '<h1>No Record found :(</h1>';
    }
    mysqli_close($conn);
}

    ?>
    


</body>
</html>
