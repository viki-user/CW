<?php
include './../../phpmailer/indexn.php' ;
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$val = $_GET['tag'] ;
$usr = $_GET['id'] ;
$date = date("Y-m-d H:i:s");

if($val == 'accept'){
$sql = "INSERT INTO new_records VALUES('','$usr','$date','ACCEPT','ACCEPTED') ; " ;
if($db->query($sql)==true){
  $t = 'harsh.1631066@kiet.edu' ;
  $sub = 'Leave Accepted' ;
  $bd = 'Your Leave have been Accepted on'. $date ;
  $fl= 0 ;
  emailn($t, $sub, $bd, $fl) ;
}
else {
  echo 'not inserted' ;
  }
}



?>
