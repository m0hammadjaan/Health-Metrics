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
        <h1>Update Doctor</h1>
    </center>
    <?php 
    $doid=$_GET['id'];
    $sql_select="select * from doctor where DOCID={$doid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
<form action="" method="post">
        <input type="hidden" name="do_id" value="<?php echo $data['DOCID'] ?>"/><br>
        First Name <input type="text" name="fname" value="<?php echo $data['DOC_FNAME'] ?>" /> e.g. Muhammad <br>
        Last Name <input type="text" name="lname" value="<?php echo $data['DOC_LNAME'] ?>"/> e.g. Jan <br>
        Gender:   Male <input type="radio" name="gender" <?php if($data['GENDER'] == "Male"){echo "checked"; $egender="Male";}?> value="Male" /> Female <input type="radio" name="gender" <?php if($data['GENDER'] == "Female"){echo "checked"; $egender="Female";}?> value="Female" /> <br>
        Email <input type="email" name="email" value="<?php echo $data['DOC_EMAIL'] ?>"/> e.g. abc_123@xyz.com <br>
        Qualification <input type="text" name="specialization" value="<?php echo $data['SPECIALIZATION'] ?>" /> e.g. Director <br>
        Contact <input type="number" name="contact" value="<?php echo $data['DOC_CONTACT'] ?>" /> e.g. 03XXXXXXXXX <br>
        CNIC <input type="number" name="cnic" value="<?php echo $data['DOC_CNIC'] ?>" /> XXXXXXXXXXXXX <br>
        DOB <input type=text placeholder="YYYY-MM-DD" name="dob" value="<?php echo $data['DOB'] ?>"/> e.g. 2001-02-25 <br>
        <input type="submit" name="submit" value="Update"/>
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