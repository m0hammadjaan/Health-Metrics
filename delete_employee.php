
<?php
include('connections.php');
include('header.php');
error_reporting(0);
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
        <h1>Delete Employee</h1>
    </center>
    <?php
    
$eid=$_GET['id'];
$sql="DELETE FROM EMPLOYEE WHERE EMPID='{$eid}'";
/*
$sql_check="select count(DEPID) from dependents where EMPID='{$eid}'";
$result_check=mysqli_query($conn,$sql_check);
while($data_check=mysqli_fetch_assoc($result_check)){

if($data_check['count(DEPID)'] > 0)
{
    #header("Location: http://localhost/testpro/read_dependents.php");
    echo 'dependents are present for this Employee ID';

}
else{
    $eid=$_GET['id'];
$sql="DELETE FROM EMPLOYEE WHERE EMPID='{$eid}'";
$result=mysqli_query($conn,$sql);
if($result){
echo 'Data Deleted Successfully';
    header("Location: http://localhost/testpro/read_employee.php");}
}
}

#echo 'jaaaan';

if($result)
{
    echo 'Data Deleted Successfully';
    header("Location: http://localhost/Project/Php/Employee/read_employee.php");
}
*/
$result=mysqli_query($conn,$sql);
if($result){
echo 'Data Deleted Successfully';
    #header("Location: http://localhost/testpro/read_employee.php");
    echo "<script>window.top.location='http://localhost/testpro/read_employee.php'</script>";
}
else{
    echo ' <h1>Data not Deleted Successfully because of the following reason(s)</h1><h1>&#128557;</h1>
    <ul>
    <li>this employee has <a href="view_dependents.php"> dependents</a></li>
    <li>this record is present in token</li>
    <li>this record is present in General checkup
    </ul>';
}
mysqli_close($conn);
    ?>
</body>
</html>