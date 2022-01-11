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
    
<center>
        <h1>Read Employee</h1>
    </center>
    <?php
    $sql="select * from employee";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
    <table border="1">
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
                <a href="update_employee.php?id=<?php echo $data['EMPID']; ?>">Update</a>
                <a onClick="javascript: return confirm('Please confirm deletion');" href="delete_employee.php?id=<?php echo $data['EMPID']; ?>">Delete</a>
                <a href="create_dependents.php?id=<?php echo $data['EMPID']; ?>">Add Dependents</a>
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
    ?>
</body>
</html>