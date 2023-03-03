<?php include('connections.php');
include('header.php');
error_reporting(0); 
if($_SESSION['username']!='assistant')
{
    echo '<center><h1 class="text-danger">You donot have the access :(</h1></center>';
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HM | Assistant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
 
        <h1 class="text-center text-primary">Assistant Checkup</h1>
   
<?php 
    $tid=$_GET['id'];
    ?>
    <form action="" method="post">
    <div class="form-group"> <h6 class="font-weight-bold">Token ID </h6><input class="form-control" type="number" name="tid" value="<?php echo $tid ?>" disabled /></div>
    <div class="form-group"> <h6 class="font-weight-bold"> BP </h6><input class="form-control" type="text" name="bp" /><small class="form-text text-muted"> e.g. 120/75 </small></div>
    <div class="form-group"> <h6 class="font-weight-bold"> Temperature </h6> <input class="form-control" type="number" name="temperature" /><small class="form-text text-muted"> e.g. 98 </small></div>
    <div class="form-group"> <h6 class="font-weight-bold">Pulse</h6> <input class="form-control" type="number" name="pulse" /><small class="form-text text-muted">e.g. 77</small></div>
    <div class="form-group"> <h6 class="font-weight-bold">Blood Glucose<input class="form-control" type="number" name="glucose"/><small class="form-text text-muted"> e.g. 130 </small></div>
    <div class="row">
        <div class="col-md-12">
        <input class="btn btn-outline-primary btn-lg w-100" type="submit" name="submit" value="Submit"/>
        </div>
        </div>
    </form>
    </div>
    <div class="col-md-4"></div>
    </div>
    <?php
    $bp=$_POST['bp'];
    $temperature=$_POST['temperature'];
    $pulse=$_POST['pulse'];
    $glucose=$_POST['glucose'];
    $sql="insert into doctor_assistant (TOKENID,BP,TEMPERATURE,PULSE,GLUCOSE) values('{$tid}','{$bp}','{$temperature}','{$pulse}','{$glucose}')";
    if(isset($_POST['submit']) && $tid!='')
    {
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo 'Data Inserted Successfully :)';
        #header("Location: http://localhost/testpro/read_dependents.php");
        
        echo "<script>window.top.location='http://localhost/testpro/assistant_token_view.php'</script>";
    }
    else{
        echo 'Data not Inserted :(';
    }
    }
    else{
        echo '';
    }
    ?>
</body>
</html>
<?php } ?>