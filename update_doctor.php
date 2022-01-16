<?php include('connections.php');

error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Health Metrics | Update Doctor</title>
</head>
<body>
    
   
    <div class="container">
    <div class="title"> Update Doctor</div>
    <div class="content">
    
     <form action="" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Doctor ID</span>
            <input type="hidden" name="do_id"  value=" <?php echo $data['DOCID'] ?>"  />
          </div>
         
        
    <div class="input-box">
            <span class="details">First Name </span>
            <input type="text" name="fname" value=" <?php echo $data['DOC_FNAME'] ?>"  /> e.g. Muhammad
          </div>
          <div class="input-box">
            <span class="details">Last Name </span>
            <input type="text" name="lname" value="<?php echo $data['DOC_LNAME'] ?>"/> e.g. Jan
          </div>
        
          </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" <?php if($data['GENDER'] == "Male"){echo "checked"; $dgender="Male";}?> value="Male" />
          <input type="radio" name="gender" id="dot-2" <?php if($data['GENDER'] == "Female"){echo "checked"; $dgender="Female";}?> value="Female"/>
          
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
         
          </div>
        </div>
        <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" value=" <?php echo $data['DOC_EMAIL'] ?>" /> e.g. abc_123@xyz.com
          </div>
          <div class="input-box">
            <span class="details">Qualification</span>
            <input type="text" name="specialization" value=" <?php echo $data['SPECIALIZATION'] ?>" />e.g. Neurologist
          </div>
          <div class="input-box">
            <span class="details">CNIC Number</span>
            <input type="number" name="contact" value=" <?php echo $data['DOC_CONTACT'] ?>" />e.g. 03XXXXXXXXX
          </div>
        <div class="input-box">
            <span class="details">CNIC Number</span>
            <input type="number" name="cnic" value=" <?php echo $data['DOC_CNIC'] ?>" /> XXXXXXXXXXXXX
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="text" placeholder="YYYY-MM-DD" name="dob"  value="<?php echo $data['DOB'] ?>"> e.g. 2001-02-25 
          </div>
         
        <div class="button">
          <input type="submit" value="Submit" name="submit">
        </div>
      </form>
    </div>
  </div>

  <?php 
    $doid=$_GET['id'];
    $sql_select="select * from doctor where DOCID={$doid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
      
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
        echo "<script>window.top.location='http://localhost/Health_Metrics/read_doctor.php'</script>";
    }
    else{
        echo 'Data not Updated :(';
    }
  }
   ?>
</body>
</html>
