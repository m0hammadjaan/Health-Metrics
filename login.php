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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
    <title>Health Metrics | Log In</title>
</head>
<body>
    <div class="back-login">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                    <center>
                        <img src="HealthMetrics.png" alt="Health Metrics" srcset="">
                    </center>
                    <h1 class="text-center text-primary">Log In</h1>
                    <form class="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <h6 class="font-weight-bold">Username</h6>
                            <input class="form-control" type="text" name="username" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <h6 class="font-weight-bold">Password</h6>
                            <input class="form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="row">
            <div class="col-md-12">
        <input class="w-100 btn btn-outline-primary btn-block btn-lg" type="submit" name="login" value="Log In"/>
        </div>
        </div>
                    </form>
            </div>
            <div class="col-md-4"></div>
            </div>
    </div>

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
            case $username=="assistant" && $password=="assistant" :
                session_start();
                $_SESSION["username"]="assistant";
                header("Location: http://localhost/testpro/assistant_token_view.php");
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