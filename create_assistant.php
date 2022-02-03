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
    <div class="div-center">
        <div class="content">
<center>
        <h1>General Check-up</h1>
    </center>
<?php 
    $tid=$_GET['id'];
    ?>
    <form action="" method="post">
    <div class="form-group"> <label for="">Token ID </label><input class="form-control" type="number" name="tid" value="<?php echo $tid ?>" disabled /></div>
    <div class="form-group"> <label for=""> BP </label><input class="form-control" type="text" name="bp" /> e.g. 120/75</div>
    <div class="form-group"> <label for=""> Temperature </label> <input class="form-control" type="number" name="temperature" /> e.g. 98 </div>
    <div class="form-group"> <label for="">Pulse</label> <input class="form-control" type="number" name="pulse" />e.g. 77</div>
    <div class="form-group"> <label for="">Blood Glucose<input class="form-control" type="number" name="glucose"/> e.g. 130 </div>
        <input class="btn btn-outline-primary" type="submit" name="submit" value="Submit"/>
    </form>
    </div>
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
        echo 'Token ID not found!';
    }
    ?>
</body>
</html>
<?php } ?>