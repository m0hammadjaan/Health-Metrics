<?php
include('connections.php');
include('header.php');
error_reporting(0);
if($_SESSION["username"]=="admin")
{
    header("Location: http://localhost/testpro/admin_dashboard.php");
}
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
    

        <h1 class="text-center text-primary">Dependent Token</h1>

    
    <?php
    $dep_id=$_GET['id'];
    $emp_fetch_sql="select * from dependents where DEPID={$dep_id}";
    $emp_fetch_result=mysqli_query($conn,$emp_fetch_sql);
    while($emp_fetch_data=mysqli_fetch_assoc($emp_fetch_result))
    {

    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <form action="" method="POST">
        <div class="form-group"><h6 class="font-weight-bold">Employee ID </h6><input type="number" name="empid" hidden value="<?php echo $emp_fetch_data['EMPID'] ?>" id="" ></div>
        <?php } ?>
        <div class="form-group"><h6 class="font-weight-bold">Dependent ID</h6><input type="number" name="depid" hidden value="<?php echo $dep_id; ?>" id="" ></div>
        <div class="form-group"><h6 class="font-weight-bold">Doctor ID</h6><select class="form-select" name="docid" id=""></div>
            <option value="" selected disabled>Select Doctor</option>
            <?php
            $select_sql="select * from doctor";
            $result_select=mysqli_query($conn,$select_sql);
            while($select_data=mysqli_fetch_assoc($result_select))
            {?>
                <option value="<?php echo $select_data['DOCID'] ?>"><?php echo $select_data['DOCID'] ?></option>
            <?php }
            ?>
        </select>
        <div class="row">
            <div class="col-md-12">
        <input class="btn btn-outline-primary btn-lg w-100" type="submit" name="submit" value="Submit">
        </div>
        </div>
        <?php
         $e_id=$_POST['empid'];
         $d_id=$_POST['depid'];
         $doc_id=$_POST['docid'];
        if(isset($_POST['submit'])  && $doc_id!="Select Doctor" ){
        $sql="insert into token(EMPID,DEPID,DOCID) values('{$e_id}','{$dep_id}','{$doc_id}')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header("Location: http://localhost/testpro/receptionist_dashboard.php");
        }
        else{
            echo "Query failed :'(";
        }
    }else{ echo ""; }
        ?>
    </form>
</div>
<div class="col-md-4"></div>
</div>
</body>
</html>