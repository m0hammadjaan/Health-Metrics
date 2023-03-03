<?php
include('connections.php');
include('header.php');
error_reporting(0);
$doid=$_GET['id'];
$sql="delete from doctor where DOCID='{$doid}'";
$result=mysqli_query($conn,$sql);
if($result)
{
    echo 'Data Deleted Successfully :)';
    header("Location: http://localhost/testpro/read_doctor.php");
}
else
{
    echo ' 
    
<center>
<h1>Delete Doctor</h1>
</center>
<h1>Data not Deleted Successfully because of the following reason(s)</h1><h1>&#128557;</h1>
    <ul>
    <li>this record is present in token</li>
    <li>this record is present in General checkup
    </ul>';
}
mysqli_close($conn);
?>