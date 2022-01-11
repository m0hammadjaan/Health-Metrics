<?php
include('connections.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
     
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
         
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Doctor Appointment System</h1>
    </center>
    <center>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        Username <input type="text" name="username" placeholder="Username" /><br><br>
        Password <input type="password" name="password" placeholder="Password" /><br><br>
        <input type="submit" name="login" value="Login"/><br><br>
    </form>
    </center>
    <?php
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=$_POST['password'];
    $sql="select * from doctor where DOCID='{$username}' AND DOC_FNAME='{$password}'";
    $result=mysqli_query($conn,$sql) or die("Query Failed :(");
    
    switch(isset($_POST['login']))
    {
        
        case mysqli_num_rows($result)>0 :
            while($data=mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["username"]=$data['DOCID'];

                header("Location: http://localhost/testpro/doc_token_view.php");
            }
            break;

            case $username=="admin" && $password=="admin" :
                session_start();
                $_SESSION["username"]="admin";
                header("Location: http://localhost/testpro/admin_dashboard.php");
                break;
            case $username=="receptionist" && $password=="receptionist" :
                session_start();
                $_SESSION["username"]="receptionist";
                header("Location: http://localhost/testpro/receptionist_dashboard.php");
                break;
            default:
                echo "Username and Password is incorrect :(";
        
    }


    /*if(isset($_POST['login']))
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=$_POST['password'];
        $sql="select * from doctor where DOCID='{$username}' AND DOC_FNAME='{$password}'";
        $result=mysqli_query($conn,$sql) or die("Query Failed :(");
        if($result)
        {
            header("Location: http://localhost/Project/Php/Employee/Dependents/read_dependents.php");
        }
    
        if(mysqli_num_rows($result)>0){
            while($data=mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["username"]=$data['DOCID'];

                header("Location: http://localhost/Project/Php/Employee/Dependents/read_dependents.php");
            }

        }
        else{
            echo 'Username and Password are not correct :(';
        }
    }
    
    elseif(isset($_POST['login']))
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=$_POST['password'];
        if($username=="admin" && $password=="admin")
        {
        $_SESSION["username"]=$username;
        header("Location: http://localhost/Project/Php/Employee/Dependents/read_dependents.php");
        }
    }*/

    ?>
</body>
</html>