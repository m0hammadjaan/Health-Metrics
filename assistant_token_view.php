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
    <title>Document</title>
</head>
<body>
    
<center>
        <h1>Tokens</h1>
    </center>
    
<?php
    #$sql="select * from token where DOCID='{$_SESSION["username"]}' ";
    $sql="SELECT * 
    FROM token 
    WHERE NOT EXISTS(
        SELECT * FROM doctor_assistant 
        WHERE token.TOKENID = doctor_assistant.TOKENID)";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    ?>
    <table class="table table-bordered border-primary">
        <tr>
            <th>TOKEN ID</th>
            <th>EMPLOYEE ID</th>
            <th>DEPENDENT ID</th>
            <th>VISIT DATE</th>
            <th>VISIT TIME</th>
            <th>DOCID</th>
            <th>ACTIONS</th>
        </tr>
        <?php

    while($data=mysqli_fetch_array($result)){
    ?>
        <tr>
            <td><?php echo $data['TOKENID']; ?></td>
            <td><?php echo $data['EMPID']; ?></td>
            <td><?php echo $data['DEPID']; ?></td>
            <td><?php echo $data['VISIT_DATE']; ?></td>
            <td><?php echo $data['VISIT_TIME']; ?></td>
            <td><?php echo $data['DOCID']; ?></td>
            <td>
                <a class="btn btn-outline-primary" href="create_assistant.php?id=<?php echo $data['TOKENID']; ?>">Proceed</a>
                <a class="btn btn-outline-danger" onClick="javascript: return confirm('Please confirm deletion');" href="delete_token.php?id=<?php echo $data['TOKENID']; ?>">Delete</a>
            </td>
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
</body>
</html>
<?php } ?>