<?php
error_reporting(0) ;
session_start() ;

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
include '../header.php' ;
$sql = "SELECT submit_on, status FROM new_records WHERE user_id ='$r' " ;
$result = mysqli_query($db,$sql);
echo '<div id="main-body">' ;
echo '<div id="pbody">' ;
echo '<h1 id="pbody-head">PREVIOUS APPLICATIONS</h1>' ;
echo '<table class="main-body">'  ;
  echo "<tr><th>SUBMITTED ON</th><th>STATUS</th></tr>" ;
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
  echo "<tr><td>" . $row['submit_on'] . "</td><td>" . $row['status'] . "</td></tr>";
}
echo '</table>' ;
echo '</div>' ;
echo '<div id="btn">
  <ul>
    <li><a href="/ncw/home.php" class="button">HOME</a></li>
  </ul>
</div>'  ;
echo '</div>' ;
include '../footer.php' ;
?>

<script>
	document.title="View Applications" ;
</script>
