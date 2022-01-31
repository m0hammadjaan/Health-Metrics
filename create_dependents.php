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
 
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Create Dependents</h1>
    </center>
<?php 
    $eid=$_GET['id'];
    ?>
    <form action="" method="post">
        Employee ID <input type="number" name="dempid" value="<?php echo $eid ?>" disabled /><br><br>
        First Name <input type="text" name="fname" /> e.g. Muhammad <br><br>
        Last Name <input type="text" name="lname" /> e.g. Jan <br><br>
        Gender:   Male <input type="radio" name="gender" value="Male" /> Female <input type="radio" name="gender" value="Female"/> <br><br>
        CNIC <input type="number" name="cnic" /> XXXXXXXXXXXXX <br><br>
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob"/> e.g. 2001-02-25 <br><br>
        <input type="submit" name="submit" value="Submit"/>
    </form>
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