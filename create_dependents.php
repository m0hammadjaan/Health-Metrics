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
    <title>Health Metrics | Create Dependents</title>
</head>
<body>
    <div class="div-center">
            <div class="content">
    <center>
        <h1>Create Dependents</h1>
    </center>

   <form action="" method="post">
        <div class="form-group"> <label for=""> Employee ID </label> <input type="number" name="dempid" value="<?php echo $eid ?>" disabled /></div>
        <div class="form-group"> <label for=""> First Name </label> <input type="text" name="fname" /> e.g. Muhammad </div>
        <div class="form-group"> <label for=""> Last Name </label><input type="text" name="lname" /> e.g. Jan </div>
       <div class="form-group"> <label class="form-label" for="">Gender:</label>  
        <div class="form-check"><label class="form-check-label" for=""> Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Male" /></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female"/></div>
        </div>
        <div class="form-group"> <label for=""> CNIC </label> <input type="number" name="cnic" /> XXXXXXXXXXXXX </div>
        <div class="form-group"> <label for=""> DOB </label> <input type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25 </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
    </form>
    </div>
    </div>
     <?php 
    $eid=$_GET['id'];
    ?>
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
