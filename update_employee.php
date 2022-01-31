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
        <h1>Update Employee</h1>
    </center>
    
    <?php 
    $eid=$_GET['id'];
    $sql_select="select * from employee where EMPID={$eid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
<form action="" method="post">
        <input type="hidden" name="e_id" value="<?php echo $data['EMPID'] ?>"/><br>
        First Name <input type="text" name="fname" value="<?php echo $data['EMP_FNAME'] ?>" /> e.g. Muhammad <br>
        Last Name <input type="text" name="lname" value="<?php echo $data['EMP_LNAME'] ?>"/> e.g. Jan <br>
        Gender:   Male <input type="radio" name="gender" <?php if($data['GENDER'] == "Male"){echo "checked"; $egender="Male";}?> value="Male" /> Female <input type="radio" name="gender" <?php if($data['GENDER'] == "Female"){echo "checked"; $egender="Female";}?> value="Female" /> <br>
        Email <input type="email" name="email" value="<?php echo $data['EMP_EMAIL'] ?>"/> e.g. abc_123@xyz.com <br>
        Designation <input type="text" name="designation" value="<?php echo $data['DESIGNATION'] ?>" /> e.g. Director <br>
        Contact <input type="number" name="contact" value="<?php echo $data['EMP_CONTACT'] ?>" /> e.g. 03XXXXXXXXX <br>
        CNIC <input type="number" name="cnic" value="<?php echo $data['EMP_CNIC'] ?>" /> XXXXXXXXXXXXX <br>
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"/> e.g. 2001-02-25 <br>
        <input type="submit" name="submit" value="Update"/>
    </form>
    <?php }
    }
    $efname = $_POST['fname'];
    $elname = $_POST['lname'];
    $egender = $_POST['gender'];
    $eemail = $_POST['email'];
    $edesignation = $_POST['designation'];
    $econtact = $_POST['contact'];
    $ecnic = $_POST['cnic'];
    $edob = $_POST['dob'];
    $sql="UPDATE employee SET EMP_FNAME='{$efname}',EMP_LNAME='{$elname}',GENDER='{$egender}',EMP_EMAIL='{$eemail}',DESIGNATION='{$edesignation}',EMP_CONTACT='{$econtact}',EMP_CNIC='{$ecnic}',DOB='{$edob}' WHERE EMPID='{$eid}'";
    if($efname!='' && $elname!='' && $egender!='' && $eemail!='' && $edesignation!='' && $econtact!='' && $ecnic!='' && $edob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Updated Successfully :)';
        #header("Location: http://localhost/testpro/read_employee.php");
        
        echo "<script>window.top.location='http://localhost/testpro/read_employee.php'</script>";
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