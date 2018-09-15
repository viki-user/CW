<?php
session_start() ;
error_reporting(0) ;

$data = $_POST['form-link'] ;
$soc = $_POST['society'] ;
$usr= $_SESSION['login_user'] ;

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$sql = "INSERT INTO form VALUES('','$soc','$data','$usr') ; " ;
try{
  $db->query($sql) ;
  header('location: /ncw/forms/all-forms.php') ;
}catch(Exception $e) {
    echo "Someting Went Wrong";
    die() ;
}
?>
