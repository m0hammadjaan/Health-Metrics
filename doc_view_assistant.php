<?php include('connections.php');
include('header.php');
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
 
    <title>Document</title>
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
    <center>
        <a class="btn btn-outline-primary" href="doc_token_view.php"> < Back </a>
    </center>
        </div>
    </div>
</body>
</html>