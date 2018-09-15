<?php   include '../header.php'  ; ?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<script>
	document.title="View Notices" ;
</script>
<div id="main-body">
  <div id="pbody">
		  <h1 id="pbody-head">NOTICES</h1>
    <?php $sql = "SELECT info FROM notice" ;
            $result = mysqli_query($db,$sql);
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  $title[] = $row['info'];
                }
              echo '<div class="div-notice-list">' ;
           foreach($title as $t){
              echo '<div class="div-notice-in">'.$t.'</div>' ;
            }
              echo '</div>' ;
    ?>
  </div>
  <div id="btn">
    <ul>
      <li><a href="/ncw/home.php" class="button">HOME</a></li>
    </ul>
  </div>
</div>
<?php include '../footer.php' ; ?>
