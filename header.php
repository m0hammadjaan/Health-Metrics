<?php
include('connections.php');
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location: http://localhost/testpro/login.php");
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
     <link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      
</head>
<body>
    </div>


    <?php
    if($_SESSION['username']=="admin"){ 
    ?>
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employee
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="create_employee.php">Create Employee</a></li>
            <li><a class="dropdown-item" href="read_employee.php">Read Employee</a></li>
            <li><a class="dropdown-item" href="read_employee.php">Update Employee</a></li>
            <li><a class="dropdown-item" href="read_employee.php">Delete Employee</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dependents
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="read_employee.php">Create Dependents</a></li>
            <li><a class="dropdown-item" href="read_dependents.php">Read Dependents</a></li>
            <li><a class="dropdown-item" href="read_dependents.php">Update Dependents</a></li>
            <li><a class="dropdown-item" href="read_dependents.php">Delete Dependents</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Doctor
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="create_doctor.php">Create Doctor</a></li>
            <li><a class="dropdown-item" href="read_doctor.php">Read Doctor</a></li>
            <li><a class="dropdown-item" href="read_doctor.php">Update Doctor</a></li>
            <li><a class="dropdown-item" href="read_doctor.php">Delete Doctor</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
           <a href="admin_dashboard.php"> <h4><?php echo $_SESSION['username'] ?></h4></a>
        </li>
        <li class="nav-item">
          <a href="logout.php">
          <input class="btn btn-outline-primary" type="button" value="Logout">
        </a>
        
        </li>
    </ul>
      </div>
    </div>
  </div>
</nav>

<?php  }
else{?>
  <nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <div class="to be done">
  <div class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <h4><?php echo $_SESSION['username'] ?></h4>
        </li>
        <li class="nav-item">
          <a href="logout.php">
          <input class="btn btn-outline-primary" type="button" value="Logout">
        </a>
        
        </li>
    </ul>
      </div>
      </div>  
</div>
</nav>
<?php }  ?>
</body>
</html>