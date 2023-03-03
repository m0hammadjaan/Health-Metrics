<?php include('connections.php');
include('header.php');
error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

        <h1 class="text-center text-primary">Check-up</h1>

    
    <?php
    $token_id=$_GET['id'];
    $select_sql="select * from token where TOKENID='{$token_id}'";
    $result_select=mysqli_query($conn,$select_sql);
    if(mysqli_num_rows($result_select)>0)
    {
        while($data_select=mysqli_fetch_assoc($result_select))
        {
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    
    <form action="" method="POST">
    <div class="form-group">  <h6 class="font-weight-bold">Token ID</h6><input class="form-control" type="number" name="tokenid" hidden value="<?php echo $token_id; ?>" id=""></div>
    <div class="form-group">  <h6 class="font-weight-bold">Employee ID</h6> <input class="form-control" type="number" name="empid" hidden value="<?php echo $data_select['EMPID']; ?>" id=""></div>
    <div class="form-group">  <h6 class="font-weight-bold">Dependent ID</h6><input class="form-control" type="number" name="depid" hidden value="<?php echo $data_select['DEPID']; ?>" id=""></div>
    <div class="form-group">  <h6 class="font-weight-bold">Doctor ID </h6><input class="form-control" type="number" name="docid" hidden value="<?php echo $data_select['DOCID']; ?>" id=""></div>
        <?php
        }
    }
    ?>

<div class="form-group">  <h6 class="font-weight-bold">Reason</h6> <textarea class="form-control" name="reason" id="" cols="30" rows="10"></textarea></div>
<div class="form-group">  <h6 class="font-weight-bold">Medicine </h6><textarea class="form-control" name="medicine" id="" cols="30" rows="10"></textarea></div>
<div class="form-group">  <h6 class="font-weight-bold">Vendor </h6><textarea class="form-control" name="vendor" id="" cols="30" rows="10"></textarea></div>
<div class="form-group">  <h6 class="font-weight-bold">Diagnosis <h6><textarea class="form-control" name="diagnosis" id="" cols="30" rows="10"></textarea></div>
<div class="row">
    <div class="col-md-12">
       
<input class="btn btn-outline-primary btn-lg w-100" type="submit" name="submit" value="Submit">
</div>
</div>
        <?php
        $empid=$_POST['empid'];
        $depid=$_POST['depid'];
        $docid=$_POST['docid'];
        $reason=$_POST['reason'];
        $medicine=$_POST['medicine'];
        $vendor=$_POST['vendor'];
        $diagnosis=$_POST['diagnosis'];
        try{
        switch(isset($_POST['submit']))
        {
            case $reason!="" && $medicine!="" && $vendor=="" && $diagnosis=="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,MEDICINE) values
               ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$medicine}')";
                $result=mysqli_query($conn,$sql) or die('');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor!="" && $diagnosis!="" :
                 $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,MEDICINE,VENDOR,DIAGNOSIS) values 
                 ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$medicine}','{$vendor}','{$diagnosis}')";
                 $result=mysqli_query($conn,$sql) or die('');
                 header("Location: http://localhost/testpro/doc_token_view.php");
                 break;
            case $reason!="" && $medicine=="" && $vendor!="" && $diagnosis!="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,VENDOR,DIAGNOSIS) values 
                ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$vendor}','{$diagnosis}')";
                $result=mysqli_query($conn,$sql) or die('');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor=="" && $diagnosis=="" &&$depid=="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DOCID,REASON,MEDICINE) values
                ('{$token_id}','{$empid}','{$docid}','{$reason}','{$medicine}')";
                $result=mysqli_query($conn,$sql) or die('');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            default:
                echo '<h6 class="text-center text-danger">something went wrong :(</h6>';
                break;
        }
    }
    catch(Exception $e)
    {
        echo 'Message: ' .$e->getMessage();
    }
        ?>
        
    </form>
    </div>
    <div class="col-md-4"></div>
    </div>
</body>
</html>