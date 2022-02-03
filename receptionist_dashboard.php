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
  <link rel="stylesheet" href="style.css">
  <title>Health Metrics</title>
<style>
    .rec-a{
  text-decoration: inherit;
  color:  inherit;
  
}
.rec-div{
  margin: 15px;
  border-style: solid;
  padding: 20px;
  text-align: center;
  background-color: lightgrey;
  font-size: 30px
}
.rec-h3{
  margin: 5px;
  padding: 10px;
  text-align: center;
  font-size: 40px
}

</style>
</head>
<body>
    <center>
        <h1>Receptionist Dashboard</h1>
    </center> 
    <a class="rec-a" href='employee_token.php'><div class="rec-div"><h3 class="rec-h3">EMPLOYEE TOKEN</h3></div></a>
    <a class="rec-a" href='dependent_token.php'><div class="rec-div"><h3 class="rec-h3">DEPENDENT TOKEN</h3></div></a>
</body>
</html>