<?php include('connections.php');
include('header.php');
error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<center>
        <h1>Read Doctor</h1>
    </center>
    
    <?php
    $sql="select * from doctor";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
    <table class="table table-bordered border-primary">
        <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>EMAIL</th>
            <th>QUALIFICATION</th>
            <th>CONTACT</th>
            <th>CNIC</th>
            <th>DATE OF BIRTH</th>
            <th>ACTIONS</th>
        </tr>
        <?php

    while($data=mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?php echo $data['DOCID']; ?></td>
            <td><?php echo $data['DOC_FNAME']; ?></td>
            <td><?php echo $data['DOC_LNAME']; ?></td>
            <td><?php echo $data['GENDER']; ?></td>
            <td><?php echo $data['DOC_EMAIL']; ?></td>
            <td><?php echo $data['SPECIALIZATION']; ?></td>
            <td><?php echo $data['DOC_CONTACT']; ?></td>
            <td><?php echo $data['DOC_CNIC']; ?></td>
            <td><?php echo $data['DOB']; ?></td>
            <td>
                <a class="btn btn-primary" href="update_doctor.php?id=<?php echo $data['DOCID']; ?>">Update</a>
                <a class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion');" href="delete_doctor.php?id=<?php echo $data['DOCID']; ?>">Delete</a>
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