<?php include('connections.php');
include('header.php');
error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="style.css">
    <title>Health Metrics | Create Employee</title>

</head>
<body>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4"></div>
        <div class="col-md-4 col-sm-4 col-xs-4">
        
    
        <h1 class="text-center">Create Employee</h1>
    
    <form action="" method="post">
        <div class="form-group"> <label for=""> First Name </label><input class="form-control" type="text" name="fname" /> e.g. Muhammad </div>
        <div class="form-group"> <label for="">Last Name</label> <input class="form-control" type="text" name="lname" /> e.g. Jan </div>
        <div class="form-group"> <label class="form-label" for="">Gender:</label>  
        <div class="form-check"><label class="form-check-label" for=""> Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Male" /></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female"/></div>
        </div>
        <div class="form-group"> <label for="">Email</label> <input class="form-control" type="email" name="email"/> e.g. abc_123@xyz.com </div>
        <div class="form-group"> <label for="">Designation</label> <input class="form-control" type="text" name="designation" /> e.g. Director </div>
        <div class="form-group"> <label for="">Contact</label> <input class="form-control" type="number" name="contact" /> e.g. 03XXXXXXXXX </div>
        <div class="form-group"> <label for="">CNIC</label> <input class="form-control" type="number" name="cnic" /> XXXXXXXXXXXXX </div>
        <div class="form-group"> <label for="">DOB</label> <input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25</div>
        <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
    </form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4"></div>
    
</div>
    <?php
    $efname = $_POST['fname'];
    $elname = $_POST['lname'];
    $egender = $_POST['gender'];
    $eemail = $_POST['email'];
    $edesignation = $_POST['designation'];
    $econtact = $_POST['contact'];
    $ecnic = $_POST['cnic'];
    $edob = $_POST['dob'];
    $sql="insert into employee (EMP_FNAME,EMP_LNAME,GENDER,EMP_EMAIL,DESIGNATION,EMP_CONTACT,EMP_CNIC,DOB) values ('{$efname}','{$elname}','{$egender}','{$eemail}','{$edesignation}','{$econtact}','{$ecnic}','{$edob}')";
    if($efname!='' && $elname!='' && $egender!='' && $eemail!='' && $edesignation!='' && $econtact!='' && $ecnic!='' && $edob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Inserted Successfully :)';
        #header('Location: http://localhost/testpro/read_employee.php',true);
        echo "<script>window.top.location='http://localhost/testpro/read_employee.php'</script>";
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