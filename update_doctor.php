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
<h1 class="text-center text-primary ">Update Doctor</h1>
    <?php 
    $doid=$_GET['id'];
    $sql_select="select * from doctor where DOCID={$doid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
<form action="" method="post">
        <input type="hidden" name="do_id" value="<?php echo $data['DOCID'] ?>"/><br>
        <div class="form-group">  <h6 class="font-weight-bold">First Name </h6> <input class="form-control" type="text" name="fname" value="<?php echo $data['DOC_FNAME'] ?>"/> <small class="form-text text-muted"> e.g. Muhammad </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Last Name </h6> <input class="form-control" type="text" name="lname" value="<?php echo $data['DOC_LNAME'] ?>" /> <small class="form-text text-muted"> e.g. Jan </small></div>
        <div class="form-group">  <h6 class="font-weight-bold">Gender: </h6>
        <div class="form-check"><label class="form-check-label" for=""> Male</label> 
        <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($data['GENDER'] == "Male"){echo "checked"; $egender="Male";}?> value="Male"/></div>
        <div class="form-check"><label class="form-check-label" for=""> Female </label> 
        <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($data['GENDER'] == "Female"){echo "checked"; $egender="Female";}?> value="Female"/></div>
        </div>
        <div class="form-group">  <h6 class="font-weight-bold">Email </h6> <input class="form-control" type="email" name="email" value="<?php echo $data['DOC_EMAIL'] ?>"/> <small class="form-text text-muted"> e.g. abc_123@xyz.com </small></div> 
        <div class="form-group">  <h6 class="font-weight-bold">Qualification </h6> <input class="form-control" type="text" name="specialization" value="<?php echo $data['SPECIALIZATION'] ?>"/><small class="form-text text-muted"> e.g. Cardiologist </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">Contact </h6> <input class="form-control" type="number" name="contact" value="<?php echo $data['DOC_CONTACT'] ?>" /> <small class="form-text text-muted"> e.g. 03XXXXXXXXX </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">CNIC </h6> <input class="form-control" type="number" name="cnic" value="<?php echo $data['DOC_CNIC'] ?>" /> <small class="form-text text-muted"> e.g. XXXXXXXXXXXXX </small> </div>
        <div class="form-group">  <h6 class="font-weight-bold">DOB </h6><input class="form-control" type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"/> <small class="form-text text-muted"> e.g. 2001-02-25 </small></div>
        <div class="row">
            <div class="col-md-12">
        <input class="w-100 btn btn-outline-primary btn-block btn-lg" type="submit" name="submit" value="Update"/>
        </div>
        </div>
        
    </form>
    <?php }
    }
    $dofname = $_POST['fname'];
    $dolname = $_POST['lname'];
    $dogender = $_POST['gender'];
    $doemail = $_POST['email'];
    $dospecialization = $_POST['specialization'];
    $docontact = $_POST['contact'];
    $docnic = $_POST['cnic'];
    $dodob = $_POST['dob'];
    $sql="UPDATE doctor SET DOC_FNAME='{$dofname}',DOC_LNAME='{$dolname}',GENDER='{$dogender}',DOC_EMAIL='{$doemail}',SPECIALIZATION='{$dospecialization}',DOC_CONTACT='{$docontact}',DOC_CNIC='{$docnic}',DOB='{$dodob}' WHERE DOCID='{$doid}'";
    if($dofname!='' && $dolname!='' && $dogender!='' && $doemail!='' && $dospecialization!='' && $docontact!='' && $docnic!='' && $dodob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Updated Successfully :)';
        #header("Location: http://localhost/testpro/read_doctor.php");
        echo "<script>window.top.location='http://localhost/testpro/read_doctor.php'</script>";
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