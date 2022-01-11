<?php
include('connections.php');
$del_id=$_GET['id'];
$sql="delete from token where TOKENID='{$del_id}'";
$result=mysqli_query($conn,$sql);
if($result)
{
    header("Location: http://localhost/testpro/doc_token_view.php");
}
else
{
    echo '
    
<center>
<h1>Delete Token</h1>
</center>
Deletion Unsuccessful :(';
}
?>