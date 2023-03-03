<?php 
include('connections.php');
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/testpro/login.php");

?>