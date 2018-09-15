<?php
session_start() ;
error_reporting(-1) ;

$data = $_POST['notice-body'] ;
$usr= $_SESSION['login_user'] ;

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$sql = "INSERT INTO `notice`(`info`, `submitby`) VALUES ('$data','$usr') ; " ;
try{
  $db->query($sql) ;
  header('location: /ncw/notices/view_notices.php') ;
}catch(Exception $e) {
    echo "Someting Went Wrong";
    die() ;
}
?>
