<?php include('connections.php');
include('header.php');
error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<center>
        <h1>Read Dependents</h1>
    </center>
    
    <?php
    $sql="select * from dependents";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
     <table class="table table-bordered border-primary">
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
            <td>
                <a class="btn btn-primary" href="update_dependents.php?id=<?php echo $data['DEPID']; ?>">Update</a>
                <a class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion?');" href="http://localhost/testpro/delete_dependents.php?id=<?php echo $data['DEPID']; ?>">Delete</a>
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
