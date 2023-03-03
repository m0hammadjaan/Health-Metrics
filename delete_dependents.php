<?php
include('connections.php');
include('header.php');
error_reporting(0);
$did=$_GET['id'];
$sql="delete from dependents where DEPID='{$did}'";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo 'Data Deleted Successfully :)';
    header("Location: http://localhost/testpro/read_dependents.php");
}
else
{
    echo '
    <center>
            <h1>Delete Dependents</h1>
        </center>
        <h1>Data not Deleted Successfully because of the following reason(s)</h1><h1>&#128557;</h1>
    <ul>
    <li>this record is present in token</li>
    <li>this record is present in General checkup
    </ul>';
}
mysqli_close($conn);
?>