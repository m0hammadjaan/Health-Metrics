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
    <div class="div-center">
        <div class="content">
    <center>
        <h1>Create Doctor</h1>
    </center>
    <form action="" method="post">
        <div class="form-group">  <label for=""> First Name </label> <input class="form-control" type="text" name="fname" /> e.g. Muhammad </div>
        Last Name <input type="text" name="lname" /> e.g. Jan 
        Gender:   Male <input type="radio" name="gender" value="Male" /> Female <input type="radio" name="gender" value="Female"/> 
        Email <input type="email" name="email"/> e.g. abc_123@xyz.com 
        Qualification <input type="text" name="specialization" /> e.g. Director 
        Contact <input type="number" name="contact" /> e.g. 03XXXXXXXXX 
        CNIC <input type="number" name="cnic" /> XXXXXXXXXXXXX 
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25
        <input type="submit" name="submit" value="Submit"/>
    </form>
    </div>
    </div>
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