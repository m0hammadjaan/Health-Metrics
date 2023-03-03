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


        <h1 class="text-center text-primary">Create Dependents</h1>
    
    <?php 
    $eid=$_GET['id'];
    ?>
   <form action="" method="post">
    <div class="form-group"> <label for="">Employee ID <div class="form-group"> <label for=""><input class="form-control" type="number" name="dempid" value="<?php echo $eid ?>" disabled /></div>
        <div class="form-group"> <label for="">First Name <div class="form-group"> <label for=""><input class="form-control" type="text" name="fname" /> e.g. Muhammad </div>
        <div class="form-group"> <label for="">Last Name <div class="form-group"> <label for=""><input class="form-control" type="text" name="lname" /> e.g. Jan </div>
        <div class="form-group"> <label class="form-label" for="">Gender:</label>  
        <div class="form-check"><label class="form-check-label" for=""> Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Male" /></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female"/></div>
        </div>
        <div class="form-group"> <label for="">CNIC <div class="form-group"> <label for=""><input class="form-control" type="number" name="cnic" /> XXXXXXXXXXXXX </div>
        <div class="form-group"> <label for="">DOB <div class="form-group"> <label for=""><input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25 </div>
        <input class="btn btn-outline-success" type="submit" name="submit" value="Submit"/>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
    <?php
    $dempid=$_POST['dempid'];
    $dfname = $_POST['fname'];
    $dlname = $_POST['lname'];
    $dgender = $_POST['gender'];
    $dcnic = $_POST['cnic'];
    $ddob = $_POST['dob'];
    $sql="insert into dependents (EMPID,DEP_FNAME,DEP_LNAME,GENDER,DEP_CNIC,DOB) values ('{$eid}','{$dfname}','{$dlname}','{$dgender}','{$dcnic}','{$ddob}')";
    if($dfname!='' && $dlname!='' && $dgender!='' && $dcnic!='' && $ddob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Inserted Successfully :)';
        #header("Location: http://localhost/testpro/read_dependents.php");
        
        echo "<script>window.top.location='http://localhost/testpro/read_dependents.php'</script>";
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