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
        <h1>Update Dependents</h1>
    </center>
    
<?php 
    $did=$_GET['id'];
    $sql_select="select * from dependents where DEPID={$did}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
    <form action="" method="post">
        Employee ID <input type="number" name="dempid" value="<?php echo $data['EMPID'] ?>" disabled /><br>
        Dependent ID <input type="number" name="did" value="<?php echo $did; ?>" disabled /><br><br>
        First Name <input type="text" name="fname" value="<?php echo $data['DEP_FNAME'] ?>" /> e.g. Muhammad <br>
        Last Name <input type="text" name="lname" value="<?php echo $data['DEP_LNAME'] ?>" /> e.g. Jan <br>
        Gender:   Male <input type="radio" name="gender" <?php if($data['GENDER'] == "Male"){echo "checked"; $dgender="Male";}?> value="Male" /> Female <input type="radio" name="gender" <?php if($data['GENDER'] == "Female"){echo "checked"; $dgender="Female";}?> value="Female"/> <br>
        CNIC <input type="text" name="cnic" value=" <?php echo $data['DEP_CNIC'] ?>" /> XXXXXXXXXXXXX <br>
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"> e.g. 2001-02-25 <br>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    <?php
        }
    }
    #$dempid=$_POST['dempid'];
    $dfname = $_POST['fname'];
    $dlname = $_POST['lname'];
    $dgender = $_POST['gender'];
    $dcnic = $_POST['cnic'];
    $ddob = $_POST['dob'];
    $sql="update dependents set DEP_FNAME='{$dfname}',DEP_LNAME='{$dlname}',GENDER='{$dgender}',DEP_CNIC='{$dcnic}',DOB='{$ddob}' where DEPID='{$did}'";
    if($dfname!='' && $dlname!='' && $dgender!='' && $dcnic!='' && $ddob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Updated Successfully :)';
        #header("Location: http://localhost/testpro/read_dependents.php");
        
        echo "<script>window.top.location='http://localhost/testpro/read_dependents.php'</script>";
    }
    else{
        echo 'Data not Updated :(';
    }
    }
    else{
        echo 'All Fields are required!';
    }

    ?>
    
</body>
</html>