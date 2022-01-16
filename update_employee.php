<?php include('connections.php');

error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Health Metrics | Update Employee</title>
</head>
<body>
    

    
   
 <div class="container">
    <div class="title"> Update Employee</div>
    <div class="content">
    
     <form action="" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Doctor ID</span>
            <input type="hidden" name="e_id"  value=" <?php echo $data['EMPID'] ?>"  />
          </div>
         
        
    <div class="input-box">
            <span class="details">First Name </span>
            <input type="text" name="fname" value=" <?php echo $data['EMP_FNAME'] ?>"  /> e.g. Muhammad
          </div>
          <div class="input-box">
            <span class="details">Last Name </span>
            <input type="text" name="lname" value="<?php echo $data['EMP_LNAME'] ?>"/> e.g. Jan
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
            <input type="email" name="email" value=" <?php echo $data['EMP_EMAIL'] ?>" /> e.g. abc_123@xyz.com
          </div>
          <div class="input-box">
            <span class="details">Qualification</span>
            <input type="text" name="designation" value=" <?php echo $data['DESIGNATION'] ?>" />e.g. Director
          </div>
          <div class="input-box">
            <span class="details">CNIC Number</span>
            <input type="number" name="contact" value=" <?php echo $data['EMP_CONTACT'] ?>" />e.g. 03XXXXXXXXX
          </div>
        <div class="input-box">
            <span class="details">CNIC Number</span>
            <input type="number" name="cnic" value=" <?php echo $data['EMP_CNIC'] ?>" /> XXXXXXXXXXXXX
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
    $eid=$_GET['id'];
    $sql_select="select * from employee where EMPID={$eid}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>




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
        
        echo "<script>window.top.location='http://localhost/Health_Metrics/read_employee.php'</script>";
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
