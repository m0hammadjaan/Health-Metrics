<?php include('connections.php');

error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Health Metrics | Update Dependents</title>
</head>
<body>

    

    <?php 
    $did=$_GET['id'];
    $sql_select="select * from dependents where DEPID={$did}";
    $result_select=mysqli_query($conn,$sql_select);
    if(mysqli_num_rows($result_select)>0){
        while($data=mysqli_fetch_assoc($result_select)){
    ?>
    <div class="container">
    <div class="title"> <center>Update Dependents</center></div>
    <div class="content">
    
     <form action="" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Employee ID</span>
            <input type="number" name="dempid"  value=" <?php echo $data['EMPID'] ?>" disabled />
          </div>
          <div class="input-box">
            <span class="details">Dependent ID</span>
            <input type="number" name="did"  value=" <?php echo $did; ?>" disabled />
          </div>
    <form action="" method="post">
        
    <div class="input-box">
            <span class="details">First Name </span>
            <input type="text" name="fname" value=" <?php echo $data['DEP_FNAME'] ?>"  /> e.g. Muhammad
          </div>
          <div class="input-box">
            <span class="details">Last Name </span>
            <input type="text" name="lname" value="<?php echo $data['DEP_LNAME'] ?>"/> e.g. Jan
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
            <span class="details">CNIC Number</span>
            <input type="number" name="cnic" value=" <?php echo $data['DEP_CNIC'] ?>" /> XXXXXXXXXXXXX
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
        
        echo "<script>window.top.location='http://localhost/Health_Metrics/read_dependents.php'</script>";
    }
    else{
        echo 'Data not Updated :(';
    }
    }
   

    ?>
    
</body>
</html>
