<?php
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

$sql = "SELECT name, sem, year, rollno FROM user_info WHERE id = '$r'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$name = $row['name'] ;
$sem = $row['sem'] ;
$year = $row['year'] ;
$rno = $row['rollno'] ;
$link = "./images/". $usr . ".jpg" ;
?>
 <script>
 	document.title="CW : HOME" ;
 </script>
        <div id="main-body">
          <div class="banner"><span class="stext">DASHBOARD</span></div>
            <div id="pbody">
              <div id="img-container"><img src="<?php echo $link ?>" class="proimg"></div>
                <div id="info-holder">
                  <div id="info">
                    <div class="spaninfo"><span class="info">NAME: </span><?php echo $name?></div>
                    <div class="spaninfo"><span class="info">SEMESTER: </span><?php echo $sem?></div>
                    <div class="spaninfo"><span class="info">YEAR: </span><?php echo $year?></div>
                    <div class="spaninfo"><span class="info">ROLL NO: </span><?php echo $rno?></div>
                  </div>
                </div>
              </div>
          <div class="banner"><span class="stext">NOTICES</span></div>
          <div id="noticepbody">
            <marquee direction="up"> <div id="noticeholder">
              <?php $sql = "SELECT info FROM notice" ; $result = mysqli_query($db,$sql); while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ $title[] = $row['info']; };
                    echo '<ul class="notice-list">' ;
                     foreach($title as $t){
                      echo '<li class="notice-li">'.$t.'</li><br /><br />' ;
                     }
                     echo '</ul>' ;
              ?>
            </div> </marquee>
                </div>
      </div>
