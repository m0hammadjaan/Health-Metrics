<?php 
include('connections.php');
include('header.php');
error_reporting(0);
if($_SESSION["username"]=="admin")
{
    header("Location: http://localhost/testpro/admin_dashboard.php");
}
?>
<html>
<head>
<style>
a{
    text-decoration: inherit;
    color:  inherit;
    
}
div{
    margin: 15px;
    border-style: solid;
    padding: 20px;
    text-align: center;
    background-color: lightgrey;
    font-size: 30px
}
h3{
    margin: 5px;
    padding: 10px;
    text-align: center;
    font-size: 40px
}
}
</style>
<title>
Doctor Appointment System
</title>
</head>
<body>
    <center>
        <h1>Receptionist Dashboard</h1>
    </center> 
    <a href='employee_token.php'><div><h3>EMPLOYEE TOKEN</h3></div></a>
    <a href='dependent_token.php'><div><h3>DEPENDENT TOKEN</h3></div></a>
</body>
</html>