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
    
<h1 class="text-center text-primary">Update Dependents</h1>
    
<?php 
    $did=$_GET['id'];
    $sql_select="select * from dependents where DEPID={$did}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <form action="" method="post">
    <div class="form-group">  <h6 class="font-weight-bold">Employee ID </h6><input class="form-control" type="number" name="dempid" value="<?php echo $data['EMPID'] ?>" disabled /><br>
        <div class="form-group">  <h6 class="font-weight-bold">Dependent ID </h6><input class="form-control" type="number" name="did" value="<?php echo $did; ?>" disabled /><br><br>
        <div class="form-group">  <h6 class="font-weight-bold">First Name </h6><input class="form-control" type="text" name="fname" value="<?php echo $data['DEP_FNAME'] ?>" /> <small class="form-text text-muted">e.g. Muhammad </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Last Name </h6><input class="form-control" type="text" name="lname" value="<?php echo $data['DEP_LNAME'] ?>" /> <small class="form-text text-muted">e.g. Jan </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Gender:  </h6> 
        <div class="form-check"><label>Male </label> <input class="form-check-input" type="radio" name="gender" <?php if($data['GENDER'] == "Male"){echo "checked"; $dgender="Male";}?> value="Male" /> </div>
        <div class="form-check"><label>Female </label> <input class="form-check-input" type="radio" name="gender" <?php if($data['GENDER'] == "Female"){echo "checked"; $dgender="Female";}?> value="Female"/> </div>
        <div class="form-group">  <h6 class="font-weight-bold">CNIC </h6><input class="form-control" type="text" name="cnic" value=" <?php echo $data['DEP_CNIC'] ?>" /> XXXXXXXXXXXXX <br>
        <div class="form-group">  <h6 class="font-weight-bold">DOB </h6><input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"/><small class="form-text text-muted"> e.g. 2001-02-25 </small></div>
        <div class="row">
            <div class="col-md-12">
        <input class="w-100 btn btn-outline-primary btn-block btn-lg" type="submit" name="submit" value="Update"/>
        </div>
        </div>
    </form>
    </div>
    <div class="col-md-4"></div>
    </div>
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