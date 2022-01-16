<?php include('connections.php');

error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Checkup</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="slip.css">
</head>
<body>
    

    <div class="testbox">
      <form action="/"  method="POST">
        <h1>General Checkup</h1>
        <div class="item">
          <p>Token ID</p>
          <input type="number" name="tokenid" hidden value="<?php echo $token_id; ?>" id="">
        </div>
        <div class="item">
          <p>Employee ID </p>
          <input type="number" name="empid" hidden value="<?php echo $data_select['EMPID']; ?>" id="">
        </div>
        <div class="item">
          <p>Dependent ID</p>
          <input type="number" name="depid" hidden value="<?php echo $data_select['DEPID']; ?>" id="">
        </div>
        <div class="item">
          <p>Doctor ID</p>
          <input type="number" name="docid" hidden value="<?php echo $data_select['DOCID']; ?>" id="">
        </div>
    
      

    
    <div class="item">
          <p>Reason</p>
          <textarea name="reason" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="item">
          <p>Medicine</p>
          <textarea name="medicine" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="item">
          <p>Vendor</p>
          <textarea name="vendor" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="item">
          <p>Diagnosis</p>
          <textarea name="diagnosis" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="btn-block">
          <button type="submit"  name="submit" value="Submit" >SUBMIT</button>
        </div>

        </form>
    </div>
    <?php
    $token_id=$_GET['id'];
    $select_sql="select * from token where TOKENID='{$token_id}'";
    $result_select=mysqli_query($conn,$select_sql);
    if(mysqli_num_rows($result_select)>0)
    {
        while($data_select=mysqli_fetch_assoc($result_select))
        {
    ?>
      <?php
        }
    }
    ?>
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
                header("Location: http://localhost/Health_Metrics/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor!="" && $diagnosis!="" :
                 $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,MEDICINE,VENDOR,DIAGNOSIS) values 
                 ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$medicine}','{$vendor}','{$diagnosis}')";
                 $result=mysqli_query($conn,$sql) or die('Failed :(');
                 header("Location: http://localhost/Health_Metrics/doc_token_view.php");
                 break;
            case $reason!="" && $medicine=="" && $vendor!="" && $diagnosis!="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DEPID,DOCID,REASON,VENDOR,DIAGNOSIS) values 
                ('{$token_id}','{$empid}','{$depid}','{$docid}','{$reason}','{$vendor}','{$diagnosis}')";
                $result=mysqli_query($conn,$sql) or die('Failed :(');
                header("Location: http://localhost/Health_Metrics/doc_token_view.php");
                break;
            case $reason!="" && $medicine!="" && $vendor=="" && $diagnosis=="" &&$depid=="" :
                $sql="insert into general_checkup(TOKENID,EMPID,DOCID,REASON,MEDICINE) values
                ('{$token_id}','{$empid}','{$docid}','{$reason}','{$medicine}')";
                $result=mysqli_query($conn,$sql) or die('Failed :(');
                header("Location: http://localhost/Health_Metrics/doc_token_view.php");
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
