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
        <h1>Create Doctor</h1>
    </center>
    <form action="" method="post">
        First Name <input type="text" name="fname" /> e.g. Muhammad <br><br>
        Last Name <input type="text" name="lname" /> e.g. Jan <br><br>
        Gender:   Male <input type="radio" name="gender" value="Male" /> Female <input type="radio" name="gender" value="Female"/> <br><br>
        Email <input type="email" name="email"/> e.g. abc_123@xyz.com <br><br>
        Qualification <input type="text" name="specialization" /> e.g. Director <br><br>
        Contact <input type="number" name="contact" /> e.g. 03XXXXXXXXX <br><br>
        CNIC <input type="number" name="cnic" /> XXXXXXXXXXXXX <br><br>
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25 <br><br>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <?php
    $dofname = $_POST['fname'];
    $dolname = $_POST['lname'];
    $dogender = $_POST['gender'];
    $doemail = $_POST['email'];
    $dospecialization = $_POST['specialization'];
    $docontact = $_POST['contact'];
    $docnic = $_POST['cnic'];
    $dodob = $_POST['dob'];
    $sql="insert into doctor (DOC_FNAME,DOC_LNAME,GENDER,DOC_EMAIL,SPECIALIZATION,DOC_CONTACT,DOC_CNIC,DOB) values
     ('{$dofname}','{$dolname}','{$dogender}','{$doemail}','{$dospecialization}','{$docontact}','{$docnic}','{$dodob}')";
    if($dofname!='' && $dolname!='' && $dogender!='' && $doemail!='' && $dospecialization!='' && $docontact!='' && $docnic!='' && $dodob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Inserted Successfully :)';
        #header("Location: http://localhost/testpro/read_doctor.php");
        
        echo "<script>window.top.location='http://localhost/testpro/read_doctor.php'</script>";
    }
    else{
        echo 'Data not Inserted :(';
    }
    }
    else{
        echo 'All Fields are required!';
    }

    ?>
    
</body>
</html>