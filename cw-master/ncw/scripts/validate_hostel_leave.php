<?php
session_start() ;

include './../../phpmailer/index.php' ;

$_SESSION['datef'] = $_POST['datef'] ;
$_SESSION['datet'] = $_POST['datet'] ;
$_SESSION['reason'] = $_POST['reason'] ;

$date1 = new DateTime($_SESSION['datef']);
$date2 = new DateTime($_SESSION['datet']);

$diff = $date2->diff($date1)->format("%r%a");

if( $diff>0 || !isset($_SESSION['reason']) )
{
  unset($_SESSION['datef']);
  unset($_SESSION['datet']);
  unset($_SESSION['reason']) ;
	header('location: /ncw/applications/submit_applications.php') ;
}

$d1=explode('-', $_SESSION['datef']) ;
$d2=explode('-', $_SESSION['datet']) ;
$_SESSION['pdfrom']=$d1[2].'-'.$d1[1].'-'.$d1[0] ;
$_SESSION['pdto']=$d2[2].'-'.$d2[1].'-'.$d2[0] ;
unset($_SESSION['datef']);
unset($_SESSION['datet']);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$usr= $_SESSION['login_user'] ;

$sql = "SELECT id FROM users WHERE username = '$usr' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$r = $row['id'] ;

$sql = "SELECT branch FROM user_info WHERE id = '$r'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$br = $row['branch'] ;

$sql = "SELECT email FROM heads WHERE dept = '$br'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$t = $row['email'] ;

$date = date("Y-m-d H:i:s");

$sub = "Regarding Leave From College" ;
$bd = "This is to inform you that i will not be there in hostel from " . $_SESSION['pdfrom'] ." to " . $_SESSION['pdto'] . " <br><a href='127.0.0.1/ncw/scripts/accept.php?tag=accept&id=". $r ."'>ACCEPT</a><br><a href='127.0.0.1/ncw/scripts/reject.php?tag=reject&id=". $r ."'>REJECT</a>"  ;
$fl = "hostel_leave.php" ;

email($t, $sub, $bd, $fl) ;
?>
