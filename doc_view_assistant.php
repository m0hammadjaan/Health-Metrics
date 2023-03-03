<?php include('connections.php');
include('header.php');
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        
        <h1 class="text-center text-primary">Assistant Record</h1>
    
<?php
$tid=$_GET['id'];
    #$sql="select * from token where DOCID='{$_SESSION["username"]}' ";
    $sql="SELECT * 
    FROM doctor_assistant 
    WHERE TOKENID={$tid}";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($data=mysqli_fetch_array($result)){
            
    ?>
    <table class="table table-bordered border-primary">
        <tr>
            <th>TOKEN ID</th>
            <td><?php echo $data['TOKENID']; ?></td>
        </tr>
        <tr>
            <th>BP</th>
            <td><?php echo $data['BP']; ?></td>
        </tr>
        <tr>
            <th>Temperature</th>
            <td><?php echo $data['TEMPERATURE']; ?></td>
        </tr>
        <tr>
            <th>Pulse</th>
            <td><?php echo $data['PULSE']; ?></td>
        </tr>
        <tr>
            <th>Blood Glucose</th>
            <td><?php echo $data['GLUCOSE']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } 
    else
    {
        echo '<h1>No Record found :(</h1>';
    }
    mysqli_close($conn);
    ?>
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-outline-primary btn-lg btn-block w-100" href="doc_token_view.php"> < Back </a>
        </div>
</div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>