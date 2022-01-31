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
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
 
    <title>Document</title>
</head>
<body>
    
<center>
        <h1>General Checkup</h1>
    </center>
    
    <?php
    $token_id=$_GET['id'];
    $select_sql="select * from token where TOKENID='{$token_id}'";
    $result_select=mysqli_query($conn,$select_sql);
    if(mysqli_num_rows($result_select)>0)
    {
        while($data_select=mysqli_fetch_assoc($result_select))
        {
    ?>
    <form action="" method="POST">
        Token ID <input type="number" name="tokenid" hidden value="<?php echo $token_id; ?>" id=""><br><br>
        Employee ID <input type="number" name="empid" hidden value="<?php echo $data_select['EMPID']; ?>" id=""><br><br>
        Dependent ID<input type="number" name="depid" hidden value="<?php echo $data_select['DEPID']; ?>" id=""><br><br>
        Doctor ID <input type="number" name="docid" hidden value="<?php echo $data_select['DOCID']; ?>" id=""><br><br>
        <?php
        }
    }
    ?>

        Reason <textarea name="reason" id="" cols="30" rows="10"></textarea><br><br>
        Medicine <textarea name="medicine" id="" cols="30" rows="10"></textarea><br><br>
        Vendor <textarea name="vendor" id="" cols="30" rows="10"></textarea><br><br>
        Diagnosis <textarea name="diagnosis" id="" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
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
                $result=mysqli_query($conn,$sql) or die('Failed :(');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor!="" && $diagnosis!="" :
                 $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,MEDICINE,VENDOR,DIAGNOSIS) values 
                 ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$medicine}','{$vendor}','{$diagnosis}')";
                 $result=mysqli_query($conn,$sql) or die('Failed :(');
                 header("Location: http://localhost/testpro/doc_token_view.php");
                 break;
            case $reason!="" && $medicine=="" && $vendor!="" && $diagnosis!="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,VENDOR,DIAGNOSIS) values 
                ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$vendor}','{$diagnosis}')";
                $result=mysqli_query($conn,$sql) or die('Failed :(');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor=="" && $diagnosis=="" &&$depid=="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DOCID,REASON,MEDICINE) values
                ('{$token_id}','{$empid}','{$docid}','{$reason}','{$medicine}')";
                $result=mysqli_query($conn,$sql) or die('Failed :(');
                header("Location: http://localhost/testpro/doc_token_view.php");
                break;
            default:
                echo 'something went wrong :(';
                break;
        }
    }
    catch(Exception $e)
    {
        echo 'Message: ' .$e->getMessage();
    }
        ?>
        
    </form>
</body>
</html>