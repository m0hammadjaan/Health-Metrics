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
<h1 class="text-center text-primary ">Create Doctor</h1>
        
    
    <form action="" method="post">
        <div class="form-group">  <h6 class="font-weight-bold">First Name </h6> <input class="form-control" type="text" name="fname" /> <small class="form-text text-muted"> e.g. Muhammad </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Last Name </h6> <input class="form-control" type="text" name="lname" /> <small class="form-text text-muted"> e.g. Jan </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Gender: </h6> 
        <div class="form-check"><label class="form-check-label" for=""> Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Male" /></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female"/></div>
        </div>
        <div class="form-group">  <h6 class="font-weight-bold">Email </h6> <input class="form-control" type="email" name="email"/> <small class="form-text text-muted"> e.g. abc_123@xyz.com </small></div> 
        <div class="form-group">  <h6 class="font-weight-bold">Qualification </h6> <input class="form-control" type="text" name="specialization" /><small class="form-text text-muted"> e.g. Cardiologist </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">Contact </h6> <input class="form-control" type="number" name="contact" /> <small class="form-text text-muted"> e.g. 03XXXXXXXXX </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">CNIC </h6> <input class="form-control" type="number" name="cnic" /> <small class="form-text text-muted"> e.g. XXXXXXXXXXXXX </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">DOB </h6><input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob"/> <small class="form-text text-muted"> e.g. 2001-02-25 </small></div>
        <div class="row">
            <div class="col-md-12">
        <input class="w-100 btn btn-outline-primary btn-block btn-lg" type="submit" name="submit" value="Submit"/>
        </div>
        </div>
        </form>
    </div>
    <div class="col-md-4"></div>
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