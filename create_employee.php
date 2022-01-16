<?php include('connections.php');


error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <title>Health Metrics | Create Employee</title>
</head>
<body>
<div class="container ">
    <div class="title">Create Employee</div>
    <div class="content">
    <form action="" method="post">
        <div class="user-details">
        
          <div class="input-box">
            <span class="details">First Name </span>
            <input type="text" placeholder="Enter your first name" name="fname" required> e.g. Muhammad
          </div>
          <div class="input-box">
            <span class="details">Last Name </span>
            <input type="text" placeholder="Enter your last name" name="lname" required> e.g. Jan
          </div>
         
         

          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          
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
            <input type="email" name="email" placeholder="Enter your email" required> e.g. abc_123@xyz.com 
          </div>
          <div class="input-box">
            <span class="details">Designation</span>
            <input type="text" name="designation" placeholder="Enter your Designation" required> e.g. Director 
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="number" name="contact" placeholder="Enter your number" required>  03XXXXXXXXX 
          </div>

        <div class="input-box">
            <span class="details">CNIC Number</span>
            <input type="number" name="cnic" placeholder="Enter your CNIC" required> XXXXXXXXXXXXX
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="text" placeholder="YYYY-MM-DD" name="dob" required> e.g. 2001-02-25 
          </div>

        <div class="button">
          <input type="submit" value="Submit" name="submit">
        </div>
      </form>
    </div>
  </div>
    <?php
    $efname = $_POST['fname'];
    $elname = $_POST['lname'];
    $egender = $_POST['gender'];
    $eemail = $_POST['email'];
    $edesignation = $_POST['designation'];
    $econtact = $_POST['contact'];
    $ecnic = $_POST['cnic'];
    $edob = $_POST['dob'];
    $sql="insert into employee (EMP_FNAME,EMP_LNAME,GENDER,EMP_EMAIL,DESIGNATION,EMP_CONTACT,EMP_CNIC,DOB) values ('{$efname}','{$elname}','{$egender}','{$eemail}','{$edesignation}','{$econtact}','{$ecnic}','{$edob}')";
    if($efname!='' && $elname!='' && $egender!='' && $eemail!='' && $edesignation!='' && $econtact!='' && $ecnic!='' && $edob!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Inserted Successfully :)';
        #header('Location: http://localhost/testpro/read_employee.php',true);
        echo "<script>window.top.location='http://localhost/Health_Metrics/read_employee.php'</script>";
    }
    else{
        echo 'Data not Inserted :(';
    }
    }
    

    ?>
    
</body>
</html>
