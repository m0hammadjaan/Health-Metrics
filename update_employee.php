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
    

        <h1 class="text-center text-primary">Update Employee</h1>
    
    
    <?php 
    $eid=$_GET['id'];
    $sql_select="select * from employee where EMPID={$eid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
<form action="" method="post">
        <input type="hidden" name="e_id" value="<?php echo $data['EMPID'] ?>"/><br>
        <div class="form-group">  <h6 class="font-weight-bold">First Name </h6><input class="form-control" type="text" name="fname" value="<?php echo $data['EMP_FNAME'] ?>" /><small class="form-text text-muted"> e.g. Muhammad </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Last Name </h6><input class="form-control" type="text" name="lname" value="<?php echo $data['EMP_LNAME'] ?>"/><small class="form-text text-muted"> e.g. Jan </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Gender: </h6>
        <div class="form-check"><label>Male </label> <input class="form-check-input" type="radio" name="gender" <?php if($data['GENDER'] == "Male"){echo "checked"; $egender="Male";}?> value="Male" /> </div>
        <div class="form-check"><label>Female </label><input class="form-check-input" type="radio" name="gender" <?php if($data['GENDER'] == "Female"){echo "checked"; $egender="Female";}?> value="Female" /> </div>
        </div>
        <div class="form-group">  <h6 class="font-weight-bold">Email </h6><input class="form-control" type="email" name="email" value="<?php echo $data['EMP_EMAIL'] ?>"/> <small class="form-text text-muted"> e.g. abc_123@xyz.com </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Designation </h6><input class="form-control" type="text" name="designation" value="<?php echo $data['DESIGNATION'] ?>" /> <small class="form-text text-muted"> e.g. Director </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Contact </h6><input class="form-control" type="number" name="contact" value="<?php echo $data['EMP_CONTACT'] ?>" /> <small class="form-text text-muted"> e.g. 03xxxxxxxxx </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">CNIC </h6> <input class="form-control" type="number" name="cnic" value="<?php echo $data['EMP_CNIC'] ?>" /> XXXXXXXXXXXXX </div>
        <div class="form-group">  <h6 class="font-weight-bold">DOB </h6><input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"/> <small class="form-text text-muted"> e.g. 2001-02-25 </small></div>
        <div class="row">
            <div class="col-md-12">
        <input class="w-100 btn btn-outline-primary btn-block btn-lg" type="submit" name="submit" value="Update"/>
        </div>
        </div>
    </form>
    </div>
    <div class="col-md-4"></div>
    </div>
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