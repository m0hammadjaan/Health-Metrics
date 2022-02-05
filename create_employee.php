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
    <div class="form-group">  <h6 class="font-weight-bold">First Name </h6><input class="form-control" type="text" name="fname" /><small class="form-text text-muted"> e.g. Muhammad </small></div>
    <div class="form-group">  <h6 class="font-weight-bold">Last Name</h6> <input class="form-control" type="text" name="lname" /> <small class="form-text text-muted">e.g. Jan </small></div>
    <div class="form-group">  <h6 class="font-weight-bold">Gender:</h6>  
    <div class="form-check"><label class="form-check-label" for=""> Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Male" /></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female"/></div>
        </div>
        <div class="form-group">  <h6 class="font-weight-bold">Email</h6> <input class="form-control" type="email" name="email"/><small class="form-text text-muted"> e.g. abc_123@xyz.com </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Designation</h6> <input class="form-control" type="text" name="designation" /><small class="form-text text-muted"> e.g. Director</small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">Contact</h6> <input class="form-control" type="number" name="contact" /><small class="form-text text-muted"> e.g. 03XXXXXXXXX</small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">CNIC</h6> <input class="form-control" type="number" name="cnic" /><small class="form-text text-muted"> XXXXXXXXXXXXX </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">DOB</h6> <input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob"/><small class="form-text text-muted"> e.g. 2001-02-25 </small></div>
        <div class="row">
            <div class="col-md-12">
        <input class="btn btn-outline-primary btn-lg w-100" type="submit" name="submit" value="Submit"/>
        </div>
        </div>
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