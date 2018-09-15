<?php

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'ncw');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(($_POST['uname']==NULL) || ($_POST['passwd']==NULL))
{
    header("location: ./../index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
  {
      // username and password sent from form
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,md5($_POST['passwd']));

      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        session_start() ;
         $_SESSION['login_user'] = $myusername;
        header("location: ./../home.php");
      }else {
         header("location: ./../index.php");
      }
   }


?>
